document.addEventListener('DOMContentLoaded', function() {
    const customSelectOptions = document.querySelectorAll('.custom-select-option');
    customSelectOptions.forEach(option => {
      option.addEventListener('click', function() {
        setOptionCustomSelect(this);
      });
    });
  });
function setOptionCustomSelect(elm) {
    const wrapper = elm.parentElement.parentElement.previousElementSibling
    const select = wrapper.firstElementChild
    const selectForm = document.querySelector('.form-control.select');
    selectForm.options[0].value = elm.dataset.value;
    select.dataset.value = elm.dataset.value
    select.innerHTML = elm.innerHTML.trim()
    wrapper.classList.remove('active')
    wrapper.dispatchEvent(
        new CustomEvent("customselect", {
            detail: {
                title: elm.innerHTML.trim(),
                value: elm.dataset.value,
            },
        }),
    );
}
