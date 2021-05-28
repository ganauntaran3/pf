'use strict';
var coPath = "/country";
var stPath = "/state";
var ciPath = "/city";
$(document).ready(function (){

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
