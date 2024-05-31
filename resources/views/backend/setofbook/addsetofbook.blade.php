<div class="modal fade" id="addSetOfBookModal" tabindex="-1" role="dialog" aria-labelledby="addSetOfBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="heading">
					<h2>Thêm bộ sách</h2>
				</div>
                <form id="addCategoryForm" method="POST" action="{{route('setofbook.store')}}">
                    @csrf
                    <input type="text" class="setofbook_name" name="setofbook_name" placeholder="Tên bộ sách">
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>