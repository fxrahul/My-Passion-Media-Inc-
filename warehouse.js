function showProduct(){
    var productName = document.querySelector('#productSelect').value;
    if(productName === 'newProduct'){
        var ref = document.querySelectorAll('.newProduct')[0];
        ref.style.display = "flex";
        ref.style.justifyContent = "center";
        ref.style.alignItems = "center";
        document.querySelectorAll('.productInput')[0].required = true;

    }else{
        document.querySelectorAll('.newProduct')[0].style.display = "none";
        document.querySelectorAll('.productInput')[0].required = false;
    }
}