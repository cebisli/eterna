const ShowBSDialog = (divId, callback, tur = 1) =>
{
	var div = $('#' + divId).show();
	var title = $('#' + divId).attr('title');
	var modalId = divId + '_modal';

	modalWrap = document.createElement('div');
	modalWrap.innerHTML = `
	  <div class="modal fade" tabindex="-1" id="`+modalId+`" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog" style="max-width:750px; height:50%;">
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
  }
