function toggleDisplay(modalType) {
  switch (modalType) {
    case 'modal-edit':
      document.querySelector(`#${modalType}`).classList.toggle('hide');
      break;
      
    case 'modal-delete':
      document.querySelector(`#${modalType}`).classList.toggle('hide');
      break;

    default:
      break;
  }

  toggleHiddenOverflow();
}

function toggleHiddenOverflow() {
  document.body.classList.toggle('overflow-hidden');
}

function editHighSeason(highSeason) {
  const start = highSeason.start.split('/').reverse().join('-');
  const end = highSeason.end.split('/').reverse().join('-');
  const priceRoom1 = highSeason.price_room_1.replace(',', '.');
  const priceRoom2 = highSeason.price_room_2.replace(',', '.');

  document.querySelector('#modal-edit form #id').value = highSeason.id;
  document.querySelector('#modal-edit form #edit-start').value = start;
  document.querySelector('#modal-edit form #edit-end').value = end;
  document.querySelector('#modal-edit form #edit-room-1').value = priceRoom1;
  document.querySelector('#modal-edit form #edit-room-2').value = priceRoom2;

  toggleDisplay('modal-edit');
}

function deleteHighSeason(highSeason) {
  document.querySelector('#modal-delete form #id-delete').value = highSeason.id;

  toggleDisplay('modal-delete');
}

function toggleResponsiveOptions(id) {
  document.querySelector(`#${id}`).classList.toggle("hide");
}