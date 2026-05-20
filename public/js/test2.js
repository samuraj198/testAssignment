(function() {

    const typeSelector = document.querySelector('select');

    function filterFields() {
        const allFields= document.querySelectorAll('input[name], button[name]');
        const type = typeSelector.value;

        for (let i = 0; i < allFields.length; i++) {
            if (allFields[i].name.includes(type)) {
                allFields[i].style.display = '';
            } else {
                allFields[i].style.display = 'none';
            }
        }
    }

    typeSelector.addEventListener('change', filterFields);

    filterFields();

    console.log("Скрипт запущен");
})();
