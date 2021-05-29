'use strict';
var coPath = "/country";
var stPath = "/state";
var ciPath = "/city";
$(document).ready(function (){

var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById("table-img");
var modalImg = document.getElementById("modal-img");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
}

var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
  modal.style.display = "none";
}

    $("div.dataTables_paginate").addClass("mb-3");

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
