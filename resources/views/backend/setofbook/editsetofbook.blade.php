@foreach($sobs as $sob)
<div class="modal fade" id="updateSetOfBookModal{{$sob->id}}" tabindex="-1" role="dialog" aria-labelledby="updateSetOfBookModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="heading">
					<h2>Sửa bộ sách</h2>
				</div>
                <form id="updateCategoryForm" method="POST" action="{{route('setofbook.update',$sob->id)}}">
                    @csrf
                    <input type="text" class="setofbook_name" name="setofbook_name" placeholder="Tên bộ sách" value="{{$sob->setofbook_name}}">
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach