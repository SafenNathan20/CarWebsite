$(function() {
    $('body').on('click', '#addSave', function(){
        var car_id = $(this).data('carid');
        $.ajax({
            method: "POST",
            url: "./ajax/toggleSave.php",
            dataType: "json",
            data: { car_id: car_id }
        }).done(function(rtnData){
            console.log(rtnData);
            $('#addSave').text('Remove From Saved').attr('id', 'removeSave');
        });
    });
    $('body').on('click', '#removeSave', function(){
        var car_id = $(this).data('carid');
        $.ajax({
            method: "POST",
            url: "./ajax/toggleSave.php",
            dataType: "json",
            data: { car_id: car_id }
        }).done(function(rtnData){
            console.log(rtnData);
            $('#removeSave').text('Add to Saved').attr('id', 'addSave');
        }); 
    });
})