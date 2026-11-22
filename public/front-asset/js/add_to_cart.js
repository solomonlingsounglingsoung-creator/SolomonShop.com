
$(document).ready(function () {

    console.log("Add to Cart JS Loaded!");

    // Show cart count
    function count() {
        let items = JSON.parse(localStorage.getItem("shops") || "[]");

        let total = 0;

        $.each(items, function (i, item) {
            total += Number(item.qty) || 0;
        });

        $("#item-count").text(total);
    }

    // Add to Cart
    $(document).on("click", ".addToCart", function (e) {

        e.preventDefault();

        console.log("Add To Cart Button Clicked!");

        let id = $(this).attr("data-id");
        let name = $(this).attr("data-name");
        let price = Number($(this).attr("data-price"));
        let discount = Number($(this).attr("data-discount")) || 0;
        let image = $(this).attr("data-image");

        let items = JSON.parse(localStorage.getItem("shops") || "[]");

        let existing = items.find(item => item.id == id);

        if (existing) {
            existing.qty = Number(existing.qty) + 1;
        } else {
            items.push({
                id: id,
                name: name,
                price: price,
                discount: discount,
                image: image,
                qty: 1
            });
        }

        localStorage.setItem("shops", JSON.stringify(items));

        count();

        alert(name + " added to cart!");

        console.log(items);
    });

    count();

});
