'use strict';
var coPath = "/country";
var stPath = "/state";
var ciPath = "/city";

function showImage(element,i){
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg'+i);
    var modalImg = document.getElementById("modal-img");
    var captionText = document.getElementById("caption");
    img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = element.src;
        captionText.innerHTML = element.alt;
    }
   }

   function closeModal(){
    var span = document.getElementById("close-modal");
    var modal = document.getElementById('myModal');
    span.onclick = function() {
      modal.style.display = "none";
    }
    }

//Jquery
$(document).ready(function (){

    //add class for styling
    $("button.buttons-copy").addClass("mx-1")
    $("div.dataTables_paginate").addClass("mb-3");

    //autocomplete input
    $("#country").typeahead({
        source: function(country, process){
            return $.get(coPath, {country:country}, function(data){
                return process(data);
            });
        }
    });

    $("#state").typeahead({
        source: function(state, process){
            return $.get(stPath, {state:state}, function(data){
                return process(data);
            });
        }
    });

    $("#city").typeahead({
        source: function(city, process){
            return $.get(ciPath, {city:city}, function(data){
                return process(data);
            });
        }
    });

});
