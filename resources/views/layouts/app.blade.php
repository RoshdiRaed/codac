<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>style</title>

    <!-- Responsive Adjustments -->
    <style>
        @media (max-width: 640px) {
            .text-3xl {
                font-size: 1.75rem;
            }

            .text-lg {
                font-size: 1rem;
            }
        }

        /* Hover Animation */
        .hover\:shadow-xl:hover {
            transform: translateY(-2px);
        }

        /* Smooth Transitions */
        .transition-shadow {
            transition: all 0.3s ease-in-out;
        }

        /* Arabic Typography Optimization */
        h2,
        p {
            font-family: 'Cairo', sans-serif;
            /* Use a modern Arabic font */
            direction: rtl;
            text-align: right;
        }
    </style>
</head>


<body>

</body>
</html>
