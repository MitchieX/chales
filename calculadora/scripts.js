// Lógica para check-in e check-out
const today = new Date().toISOString().split("T")[0];

const lastDay = new Date();
lastDay.setDate(lastDay.getDate() + interval);

const lastDayFormatted = lastDay.toISOString().split("T")[0];

const checkin = document.getElementById("checkin");
const checkout = document.getElementById("checkout");

checkin.min = today;

checkin.max = lastDayFormatted;
checkout.max = lastDayFormatted;

function add(type) {
  const quantity = Number(document.getElementById(type).value) + 1;

  document.getElementById(type).value = quantity;  
  document.getElementById(`${type}-quantity`).textContent = quantity;  
}

function subtract(type) {
  const currentQuantity = Number(document.getElementById(type).value);
  
  const quantity = (currentQuantity < 1) ? 0 : (currentQuantity - 1);

  document.getElementById(type).value = quantity;
  document.getElementById(`${type}-quantity`).textContent = quantity;  
}

function handleCheckin() {
  const checkinDay = new Date(checkin.value);
  
  const dayAfterCheckin = new Date(checkin.value);
  dayAfterCheckin.setDate(checkinDay.getDate() + 1);

  const dayAfterCheckinFormatted = dayAfterCheckin.toISOString().split("T")[0];

  checkout.disabled = false;
  checkout.min = dayAfterCheckinFormatted;
}

// onSubmit do fomulário
function validatePeopleFields(evt) {
  const single = Number(document.querySelector("input#single").value);
  const couple = Number(document.querySelector("input#couple").value);
  const underSix = Number(document.querySelector("input#underSix").value);
  const underEleven = Number(document.querySelector("input#underEleven").value);

  const amount = single + couple + underSix + underEleven;

  if (amount <= 0) {
    evt.preventDefault();

    toggleActiveMessage();
  }
}

function toggleActiveMessage() {
  document.querySelector(".message").classList.toggle("active");
}