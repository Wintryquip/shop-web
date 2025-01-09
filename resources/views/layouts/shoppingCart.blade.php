<script>
    function addToCart(productId, productName, productPrice, discount, discountPrice) {
        var productInfo = {
            productName: productName,
            productPrice: productPrice,
            discount: discount,
            discountPrice: discountPrice,
            quantity: 1
        };

        sessionStorage.setItem('productId:' + productId, JSON.stringify(productInfo));

        document.getElementById("cartItemsCounter").innerHTML = sessionStorage.length;

        Swal.fire({
            title: "Świetnie!",
            text: "Pomyślnie dodano " + productInfo.productName + " do koszyka",
            icon: "success",
            buttons: false,
            timer: 1500
        });

        document.getElementById("cartButton" + productId).innerHTML = "<button id=\"cartButton" + productId + "\" class=\"btn btn-outline-danger mt-auto\" onclick=\"removeFromCart(" + productId + ")\">Usuń z koszyka</button>";
    }

    function removeFromCart(productId) {
        var productInfo = JSON.parse(sessionStorage.getItem('productId:' + productId));

        sessionStorage.removeItem('productId:' + productId);

        document.getElementById("cartItemsCounter").innerHTML = sessionStorage.length;

        Swal.fire({
            title: "Usuwanie!",
            text: "Pomyślnie usunięto " + productInfo.productName + " z koszyka",
            icon: "success",
            buttons: false,
            timer: 1500
        });

        document.getElementById("cartButton" + productId).innerHTML = "<button id=\"cartButton" + productId + "\" class=\"btn btn-outline-success mt-auto\" onclick=\"addToCart(" + productId + ", '" + productInfo.productName + "', " + productInfo.productPrice + ", " + productInfo.discount + ", " + productInfo.discountPrice + ")\">Dodaj do koszyka</button>";
    }
</script>
