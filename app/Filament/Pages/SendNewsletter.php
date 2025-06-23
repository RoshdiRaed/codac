<?php

namespace App\Filament\Pages;

use App\Mail\NewsletterBroadcast;
use App\Models\NewsletterSubscriber;
use Filament\Forms;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;

class SendNewsletter extends Page implements HasForms
{
    use InteractsWithForms;

    public ?string $subject = null;
    public ?string $message = null;
    public array $recipients = [];

    protected static string $view = 'filament.pages.send-newsletter';

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'إرسال نشرة بريدية';

    public function mount(): void
    {
        $this->form->fill([
            'subject' => '',
            'message' => '',
            'recipients' => ['all'],
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('subject')
                ->label('عنوان النشرة')
                ->required(),

            Forms\Components\Textarea::make('message')
                ->label('محتوى النشرة')
                ->required()
                ->rows(6),

            Forms\Components\Select::make('recipients')
                ->label('المشتركين')
                ->multiple()
                ->searchable()
                ->options(
                    NewsletterSubscriber::all()->pluck('email', 'id')->prepend('📬 إرسال للجميع', 'all')
                )
                ->default(['all'])
                ->required(),
        ];
    }

    public function send()
    {
        $data = $this->form->getState();

        $emails = in_array('all', $data['recipients'])
            ? NewsletterSubscriber::pluck('email')->toArray()
            : NewsletterSubscriber::whereIn('id', $data['recipients'])->pluck('email')->toArray();

        foreach ($emails as $email) {
            Mail::mailer('smtp')->to($email)->queue(new NewsletterBroadcast($data['subject'], $data['message']));   
        }

        Notification::make()
            ->title('تم إرسال النشرة بنجاح ✅')
            ->success()
            ->send();

        $this->form->fill([
            'subject' => '',
            'message' => '',
            'recipients' => ['all'],
        ]);
    }
}
