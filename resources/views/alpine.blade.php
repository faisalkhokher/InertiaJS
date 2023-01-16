<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div x-data="{ data: false }">
        <button x-on:click='data = !data'>Open</button>
        <div x-show='data'>
            <b>Div show</b>
        </div>
    </div>
    
    <br>

    <div x-data="{
        query: '',
        url: '',
    
        submit() {
            console.log('HITING');
            url = 'https://source.unsplash.com/1600x900/?' + this.query
            console.log(url);
            if (this.query) {
                this.url = url
            }
        }
       }">

        <form x-on:click.prevent='submit'>
            <input type="text" x-model="query">
            <span x-text="url"></span>
            <br>
            <br>
            <button type="submit">Submit</button>
            <br>
            <br>
            <img x-bind:src="url" alt="" height="200" lenght="200">
            <br>
        </form>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
