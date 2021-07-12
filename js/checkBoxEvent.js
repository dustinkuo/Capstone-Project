var checkbox = document.getElementById('checkbox');

checkbox.addEventListener('change', function (){

    if(checkbox.checked)
    {
        if(document.getElementById('ship_Address2').value === ''){
            document.getElementById('ship_Address2').value = 'N/A';
            document.getElementById('bill_Address').value = document.getElementById('ship_Address').value;
            document.getElementById('bill_Address2').value = document.getElementById('ship_Address2').value;
            document.getElementById('bill_city').value = document.getElementById('ship_city').value;
            document.getElementById('bill_state').value = document.getElementById('ship_state').value;
            document.getElementById('bill_zip').value = document.getElementById('ship_zip').value;
            document.getElementById('bill_country').value = document.getElementById('ship_country').value;
        }
        else
        {
            document.getElementById('bill_Address').value = document.getElementById('ship_Address').value;
            document.getElementById('bill_Address2').value = document.getElementById('ship_Address2').value;
            document.getElementById('bill_city').value = document.getElementById('ship_city').value;
            document.getElementById('bill_state').value = document.getElementById('ship_state').value;
            document.getElementById('bill_zip').value = document.getElementById('ship_zip').value;
            document.getElementById('bill_country').value = document.getElementById('ship_country').value;
        }
    }
    else{
        document.getElementById('ship_Address2').value = '';
        document.getElementById('bill_Address').value = '';
        document.getElementById('bill_Address2').value = '';
        document.getElementById('bill_city').value = '';
        document.getElementById('bill_state').value = '';
        document.getElementById('bill_zip').value = '';
        document.getElementById('bill_country').value = '';
    }
});