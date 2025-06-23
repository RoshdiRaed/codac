<x-filament::page>
    <div class="min-h-screen py-12" dir="rtl">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <x-filament::card class="shadow-xl rounded-lg">
                <form wire:submit.prevent="send" class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        {{ $this->form->getComponent('subject') }}
                        {{ $this->form->getComponent('recipients') }}
                    </div>

                    <div class="mt-6">
                        {{ $this->form->getComponent('message') }}
                    </div>

                    <div class="flex justify-center pt-6">
                        <x-filament::button
                            type="submit"
                            size="lg"
                            color="warning"
                            icon="heroicon-o-paper-airplane"
                            class="hover:scale-105 transition-transform duration-200"
                        >
                            إرسال النشرة
                        </x-filament::button>
                    </div>
                </form>
            </x-filament::card>
        </div>
    </div>
</x-filament::page>
