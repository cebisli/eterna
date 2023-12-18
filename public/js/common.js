
const Modal_Small = 1;
const Modal_Large = 2;
const Modal_XLarge = 3;
const Modal_FullScreen = 3;
const Modal_DialogScrollable = 5;

const ShowBSDialog = (divId, callback, tur = 0) => 
{
	if (modalWrap !== null) {
	  modalWrap.remove();
	}
	
	var modalClass = "";
	if (tur == Modal_Small)
		modalClass = "modal-sm";
	else if (tur == Modal_Large)	
		modalClass = "modal-lg";
	else if (tur == Modal_XLarge)	
		modalClass = "modal-xl";
	else if (tur == Modal_FullScreen)	
		modalClass = "modal-fullscreen";
	else if (tur == Modal_DialogScrollable)	
		modalClass = "modal-dialog-scrollable";

	var div = $('#' + divId).show();
	var title = $('#' + divId).attr('title');
	var modalId = divId + '_modal';

	modalWrap = document.createElement('div');
	modalWrap.innerHTML = `
	  <div class="modal fade" tabindex="-1" id="`+modalId+`" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog `+modalClass+`">
		  <div class="modal-content">
			<div class="modal-header bg-light">
			  <h5 class="modal-title">${title}</h5>
			  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">			  
			</div>
			
		  </div>
		</div>
	  </div>
	`;
	
	div.appendTo(modalWrap.querySelector('.modal-body'));
	var modal = new bootstrap.Modal(modalWrap.querySelector('.modal'));
	modal.show();		

	/*
		Modal ın alt kısmına butonları kaymak istenirse aktif edilmeli ve
		fonksiyona yesBtnLabel = 'Yes', noBtnLabel = 'Cancel' parametreleri eklenmesi

		<div class="modal-footer bg-light">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">${noBtnLabel}</button>
			<button type="button" class="btn btn-primary modal-success-btn">${yesBtnLabel}</button>
		</div>

		modalWrap.querySelector('.modal-success-btn').onclick  =  function(e){	
		var sonuc = true;
		if (typeof callback == "function")
			sonuc = callback();		
		if (sonuc)
			modal.hide();
	}; 
	*/
  
  }