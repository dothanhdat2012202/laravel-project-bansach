@foreach($css as $cs)
<div class="modal fade" id="updateCategoryModal{{$cs->id}}" tabindex="-1" role="dialog" aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="heading">
					<h2>Sửa thể loại</h2>
				</div>
                <form id="updateCategoryForm" method="POST" action="{{route('category.update',$cs->id)}}">
                    @csrf
                    <input type="text" class="category_name" name="category_name" placeholder="Tên thể loại" value="{{$cs->category_name}}">
                    <button type="submit">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
