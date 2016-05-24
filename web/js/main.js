/**
* Main Beahviour
*/

$(function () {

    var initDraggableGrid = function () {

        console.info("Init Draggable Grid");

        // Definimos carrusel.
        $('.infiniteCarousel').infiniteCarousel({
            itemsPerMove : 1,
            duration : 500,
            vertical : true
        });

        //Definimos el carrusel para BOX
        $('.infiniteCarouselBox').infiniteCarouselBox({
            itemsPerMove : 1,
            duration : 500,
            vertical : true
        });


        // Definir Drag and Drop
        $(".droppable").droppable({
            accept : ".arrastrable",
            greedy: true,
            drop: function( event, ui ) {
                snapToMiddle(ui.draggable,$(this));
                $(this).append(ui.draggable);
                console.log(ui.draggable);
                ui.draggable.attr("style", "");
               // if($(this).attr('id')==='c3'){
                var id = $(this).attr('id');
                document.getElementById(id-1).style.display="inline-block";
                window.location.href = 'index.php?ctl=ubicacion';
               // }else if ($(this).attr('id')==='c4'){
               //         document.getElementById("f3").style.display="inline-block";
                //    }
                }
        });
        
        $(".item-wrapper .arrastrable").mousedown(function(){
            var $item =  $(this);
            var $wrapper = $item.parent();
            var $clon = $(this).clone();
            $clon.addClass("clon");
            $clon.draggable({
                revert: "invalid",
                opacity:0.6,
                create: function(){$(this).data('position',$(this).position())}
            }).appendTo($wrapper);
            $clon.css({
                position : "absolute",
                top: $item.position().top,
                left: $item.position().left,
            });
            

            $clon.trigger("drag");

        });

        function snapToMiddle(dragger, target){
            var topMove = target.position().top - dragger.data('position').top + (target.outerHeight(true) - dragger.outerHeight(true)) / 2;
            var leftMove= target.position().left - dragger.data('position').left + (target.outerWidth(true) - dragger.outerWidth(true)) / 2;
            dragger.animate({top:topMove,left:leftMove},{duration:200,easing:'linear'});
        }
        

    }

    /*var cambioColor = function(){
        $('#admision').click(function(){
            var $item = $(this);
            var $seg = $('#seguimiento');
            var $box = $('#box');
            var $est = $('#estadisticas');
            $item.css("background-color","#339999");
            //$seg.css("background-color","#4c4c4c");
            //$box.css("background-color","#4c4c4c");
            //$est.css("background-color","#4c4c4c");
        });
        $('#seguimiento').click(function(){
            var $item = $(this);
            var $ad = $('#admision');
            var $box = $('#box');
            var $est = $('#estadisticas');
            $item.css("background-color","#339999")
            //$ad.css("background-color","#4c4c4c")
            //$box.css("background-color","#4c4c4c")
            //$est.css("background-color","#4c4c4c")
        });
        $('#box').click(function(){
            var $item = $(this);
            var $seg = $('#seguimiento');
            var $ad = $('#admision');
            var $est = $('#estadisticas');
            $item.css("background-color","#339999")
            //$seg.css("background-color","#4c4c4c")
            //$ad.css("background-color","#4c4c4c")
            //$est.css("background-color","#4c4c4c")
        });
        $('#estadisticas').click(function(){
            var $item = $(this);
            var $seg = $('#seguimiento');
            var $box = $('#box');
            var $ad = $('#admision');
            $item.css("background-color","#339999")
            //$seg.css("background-color","#4c4c4c")
            //$box.css("background-color","#4c4c4c")
           //$ad.css("background-color","#4c4c4c")
        });
    }*/


    var managePages = function () {

        console.info("Init Manage Pages");

        /*$("#admision").click(function(event) {
            $("#contenedor").load('adm.html');
            $("#linkestilo").attr("href", "./css/estiloAd.css")
        });     
        $("#seguimiento").click(function(event) {
            $("#contenedor").load('seguimiento.html', initDraggableGrid);
            $("#linkestilo").attr("href", "./css/estiloSe.css")
        });
        $("#box").click(function(event) {
            $("#contenedor").load('adm.html');
            $("#linkestilo").attr("href", "./css/estiloBox.css")
        });
        $("#estadisticas").click(function(event) {
            $("#contenedor").load('adm.html');
            $("#linkestilo").attr("href", "./css/estiloEst.css")
        });     */
    }





    var init = function () {
        managePages();
        initDraggableGrid();
    }

    init();

});