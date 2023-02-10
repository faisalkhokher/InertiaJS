<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> --}}
</head>

<style>
    .bolds {
        text-align: center;
        background-color: red;
    }
</style>

<body>

    
    {{-- <div x-data="{ data: false }">
        <button x-on:click='data = !data'>Open</button>
        <div x-show='data'>
            <b>Div show</b>
        </div>
    </div>
    
    <br> --}}

    {{-- <div x-data="{
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
    </div> --}}
     
    {{-- <div x-data="{ colors: ['orange'] }">
        <input type="checkbox" value="red" x-model="colors">
        <input type="checkbox" value="orange" x-model="colors">
        <input type="checkbox" value="yellow" x-model="colors">
        <div class="pt-4">Colors: <span x-text="colors"></span></div>
    </div> --}}

    {{-- <div x-data="{
        user:['b']
    }">
        <input type="checkbox" x-model="user" value="a"> A
        <input type="checkbox" x-model="user" value="b"> B
        <input type="checkbox" x-model="user" value="c"> C
        <br>
        <strong x-show=user>Users is <i x-text='user'> </i></strong>
    </div> --}}


    {{-- Fetch API --}}
    <div x-data="{
        int1 : null,
        inp2 : null,
        inp3 : null,
        inp4 : null,
        async save() {
 
            await fetch('https://jsonplaceholder.typicode.com/todos/1')
            .then((response) => response.json())
            .then((data) => 
             this.inp2 = `${data.title}`+`IS`+`${data.completed}`,
            );
        }
     }">
        <form x-on:click.prevent="save">
         <b x-text="inp2"></b> <br>
         <b x-text="inp3"></b> <br>
         <b x-text="inp4"></b> <br>
         <button type="submit">Fetch API</button>
        </form>
    </div>

    <br>
    <div x-data='{ bolds : true}'>
        <span x-bind:class='{ bolds }'>This is static texttt</span>
    </div>


    <div>
        <br>
        <form x-data='{
            text: ""
        }'>
            <input type=text x-model='text'>
            <button type="submit" x-bind:disabled="text === '' ">Save</button>
        </form>
    </div>

    <br>
    <div x-data='{progress : null}'>
        <div class="progress">
           <progress max="100" x-bind:value="progress">
            <span x-if='progress == 99'>LIMIT</span>
           </progress>
           <span x-if='progress == 99'>LIMIT</span>
        </div>
        <button x-on:click='progress = progress + 15'>Increment</button>
    </div>

<br>
    <div x-data="{
        selected : [],
        object : [
            {'name' : 'faisal' , id: '1'},
            {'name' : 'faisal Javed' , id: '2'},
         ],
         submit(){
            
             console.log($el.getAttribute('m'));
            // const link = document.querySelector(element);
            // let method = document.getElementById(this.selected).getAttribute('data-m');
            // console.log(method)
         }
    }">
    
    <span x-text='selected'></span>
    <template x-for="obj in object" x-on:click.prevent="submit">
            <div >
            <span x-text='obj.name' x-bind:class="{ 'bolds' : selected.includes(obj.name) }"></span>
            <input type="checkbox" x-model="selected" x-bind:value="obj.name" x-bind:id="obj.id" x-bind:m="obj.name+obj.id"> 
    </div>
    </template>
</div>


    


































<script src="https://unpkg.com/alpinejs@3.3.4/dist/cdn.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>
