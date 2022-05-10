<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @routes
    <script src="{{ mix('/js/app.js') }}" defer></script>
    {{-- @inertiaHead --}}
  </head>
  <body>
    @inertia

    <script>
        console.log(route('users'));
    </script>
  </body>
</html>
