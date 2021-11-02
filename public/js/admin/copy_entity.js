(function () {
    document.addEventListener('DOMContentLoaded', () => {


        const button = document.querySelector('.copy-entity');
        if (button === null) {
            return;
        }

        button.addEventListener('click', () => {
            document.body.classList.add('loader-black');
        });


    });
})();

