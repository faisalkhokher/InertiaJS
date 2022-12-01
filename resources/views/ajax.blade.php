<!DOCTYPE html>
<html>

<head>
    <title>Load More</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>


    <div class="container">


        <h2>Items Data</h2>


        <div id="item-lists">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody class="con">

                </tbody>


            </table>
            <tbody>
                <tr>
                    <td>
                        <button type="button" class="btn btn-primary" id="ajax_btn" data-id="1">Load More</button>
                    </td>
                </tr>
            </tbody>
        </div>

    </div>


    <script>
        $(document).ready(function () {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            function loadCategory(page) {
                data = {
                    'page': page,
                };

            $.ajax({
                url: '/get/cate',
                type: 'POST',
                dataType: 'JSON',
                data: data,
                success: function (data) {

                var html = "";
                $.each(data.cat, function (i, item) {
                    html = `<tr>
                            <td scope="row">${item.id}</td>
                            <td scope="row">${item.name}</td>
                            </tr>`
                    $(".con").append(html);
                });
                if(data.cat.length <= 0){
                    $('#ajax_btn').prop("disabled" , true);
                }
            }
            });
        }
        loadCategory()

        $('#ajax_btn').click(function(){
           var page =  $(this).data("id") // getter
           page++;
           $('#ajax_btn').data("id",page); // Setter
           loadCategory(page)
        })
        });
    </script>


</body>

</html>
