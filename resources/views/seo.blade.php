<button class="seo-button" data-toggle="modal" data-target="#seo-modal">
    SEO
</button>

<div class="modal fade" id="seo-modal" tabindex="-1" role="dialog" aria-labelledby="seo-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('seo.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Настройки SEO для этой страницы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="site_name">Заголовок страницы</label>
                        <input type="text" class="form-control" id="site_name" name="site_name"
                               value="{{ App\getPageTitle(request()->path()) }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание страницы</label>
                        <textarea class="form-control" id="description" name="description">{{ App\getPageDescription(request()->path()) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="keywords">Ключевые слова</label>
                        <textarea class="form-control" id="keywords" name="keywords">{{ App\getPageKeywords(request()->path()) }}</textarea>
                    </div>
                    <input type="hidden" name="path" value="{{ request()->path() }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', ' ', "success");
        </script>
    @endif
@endpush
