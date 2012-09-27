function valida_form() {
    var f = document.form_interest;
    var v=true;
    
    if (f.first_name.value=='') {
        f.first_name.style.backgroundColor='#fc6';
        v=false;
    }
    
    if (f.last_name.value=='') {
        f.last_name.style.backgroundColor='#fc6';
        v=false;
    }
    
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(f.email.value)) {
        f.email.style.backgroundColor='#fc6';
        v=false;
    }
    
    if ((f.area_code.value=='') || (f.area_code.value.length<2) || (isNaN(f.area_code.value))) {
        f.area_code.style.backgroundColor='#fc6';
        v=false;
    }

    if ((f.phone.value=='') || (f.phone.value.length<8) || (isNaN(f.phone.value))) {
        f.phone.style.backgroundColor='#fc6';
        v=false;
    }
    
    if (v) f.submit();
}

function reset_color(elem) {
    elem.style.backgroundColor='#fff';
}