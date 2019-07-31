var image_inputs = Array.from(document.querySelectorAll('.has-preview'));

image_inputs.forEach(function (item, index, arr) {
    image_inputs[index].addEventListener("change", function () {
        var file = this.files[0],
            preview = URL.createObjectURL(file),
            container = this.getAttribute("data-preview");

        document.querySelector(container).setAttribute('src', preview);
        document.querySelector(container).style.display = 'inline-block';
    });
});
