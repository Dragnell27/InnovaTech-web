function myFunction(smallImg){
    var fullImg=document.getElementById("imgBox")
fullImg.src=smallImg.src;
}


// {{ env(API='/products') }}
// fetch (API)
// .then(response =>{
//     if(!response.ok){
// throw new Error('No se pudo obtener los datos del api')
//     }
//     return response.json();
// })
// .then(data=>{
//     'name', 
//     'code', 
//     'desc', 
//     'discount',
//     'price',
//     'images',
//     'category' ,
//     'colors',
//     'mark' ,
//     'tags'
// })

$(document).ready(function(){
    $.ajax({
        url:"{{ env('API').'/products' }}",
        method:'GET',
        dataType:'json',
        success:function(data){
            console.long('Response:',data);
        },
        error:function(error){
            console.error('error al obtener los datos del api',error);
        },
        success:function(response){
            $('#id').val(response.data[0].id)
        }
    });
});