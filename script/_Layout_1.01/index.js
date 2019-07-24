/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){

$('content').height('100%');

//Diferença entre o tamanho de {body} para {window}
var difContent = (/*($(window).height() - $('content').height()) +*/ ($('header').height() + $('footer').height()));
    
$('content').height($('content').height() - difContent);
    
});

$(window).change(function(){
    $('content').height('100%');

//Diferença entre o tamanho de {body} para {window}
var difContent = (/*($(window).height() - $('content').height()) +*/ ($('header').height() + $('footer').height()));
    
$('content').height($('content').height() - difContent);
});

//Evento do Menu
$('#btnMenu, #btnClose').click(function(){
    MenuToggle();
});

//Função Dinâmica para Abrir/Fechar o Menu
function MenuToggle(){
    
    if($('#menu').offset().left < 0){
        $('#menu').animate({left:'0'},1000);
    }else{
        $('#menu').animate({left:'-100%'},1000);
    }
}