@extends('dashboard.blog.layout')

@section('title', $post->exists ? 'Редагування статті' : 'Нова стаття')

@section('content')
    <div class="mb-5 grid gap-4 md:grid-cols-3">
        <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200 md:col-span-2">
            <p class="text-xs uppercase tracking-wide text-slate-400">Режим</p>
            <p class="mt-2 text-lg font-semibold text-slate-800">{{ $post->exists ? 'Редагування' : 'Створення' }} статті</p>
        </div>
        <div class="rounded-2xl bg-white p-4 shadow-sm ring-1 ring-slate-200">
            <p class="text-xs uppercase tracking-wide text-slate-400">Підказка</p>
            <p class="mt-2 text-sm text-slate-600">Використовуйте редактор для списків, таблиць, цитат та форматування тексту.</p>
        </div>
    </div>

    <div class="overflow-hidden rounded-2xl bg-white shadow-sm ring-1 ring-slate-200">
        <div class="border-b border-slate-200 px-5 py-4">
            <strong class="text-base font-semibold">{{ $post->exists ? 'Редагування статті' : 'Створення статті' }}</strong>
        </div>
        <div class="px-5 py-5">
            <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                @csrf
                @if($method !== 'POST')
                    @method($method)
                @endif

                <div class="grid gap-4 md:grid-cols-2">
                    <div class="mb-1">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Заголовок</label>
                        <input id="title-input" type="text" name="title" value="{{ old('title', $post->title) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('title') border-red-400 @enderror" required>
                        @error('title') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-1">
                        <label class="mb-1 block text-sm font-medium text-slate-700">Slug</label>
                        <input id="slug-input" type="text" name="slug" value="{{ old('slug', $post->slug) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('slug') border-red-400 @enderror">
                        @error('slug') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="mt-4 mb-4">
                    <p class="text-xs text-slate-500">Текст візуального редактора:</p>
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Контент</label>
                    <textarea id="content-editor" name="content" class="@error('content') border-red-400 @enderror">{{ old('content', $post->content) }}</textarea>
                    @error('content') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Meta title</label>
                    <input type="text" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('meta_title') border-red-400 @enderror">
                    @error('meta_title') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Meta description</label>
                    <textarea name="meta_description" rows="3" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('meta_description') border-red-400 @enderror">{{ old('meta_description', $post->meta_description) }}</textarea>
                    @error('meta_description') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Meta keywords</label>
                    <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $post->meta_keywords) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('meta_keywords') border-red-400 @enderror">
                    @error('meta_keywords') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="mb-4">
                    <label class="mb-1 block text-sm font-medium text-slate-700">Зображення</label>
                    <input type="file" name="featured_image" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm @error('featured_image') border-red-400 @enderror">
                    @error('featured_image') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                @php
                    $oldMode = old('publish_mode');
                    $defaultMode = optional($post->published_at)->isFuture() ? 'schedule' : (optional($post->published_at)->isPast() ? 'now' : 'draft');
                    $mode = $oldMode ?: $defaultMode;
                @endphp

                <div class="mb-5 rounded-xl border border-slate-200 bg-slate-50 p-4">
                    <label class="mb-2 block text-sm font-medium text-slate-700">Публікація</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm text-slate-700">
                            <input class="h-4 w-4" type="radio" name="publish_mode" id="publish-draft" value="draft" {{ $mode === 'draft' ? 'checked' : '' }}>
                            <span>Чернетка (не публікувати)</span>
                        </label>
                        <label class="flex items-center gap-2 text-sm text-slate-700">
                            <input class="h-4 w-4" type="radio" name="publish_mode" id="publish-now" value="now" {{ $mode === 'now' ? 'checked' : '' }}>
                            <span>Опублікувати зараз</span>
                        </label>
                        <label class="mb-1 flex items-center gap-2 text-sm text-slate-700">
                            <input class="h-4 w-4" type="radio" name="publish_mode" id="publish-schedule" value="schedule" {{ $mode === 'schedule' ? 'checked' : '' }}>
                            <span>Запланувати публікацію</span>
                        </label>
                    </div>
                    <input
                        type="datetime-local"
                        name="published_at"
                        id="published-at-input"
                        value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}"
                        class="mt-2 w-full rounded-lg border border-slate-300 px-3 py-2 text-sm outline-none ring-indigo-200 focus:ring @error('published_at') border-red-400 @enderror"
                    >
                    @error('published_at') <div class="mt-1 text-sm text-red-600">{{ $message }}</div> @enderror
                </div>

                <div class="flex gap-2">
                    <button type="submit" class="rounded-lg bg-emerald-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-emerald-700">Зберегти</button>
                    <a href="{{ route('blog-dashboard.posts.index') }}" class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-50">Назад</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .note-editable h1,
        .note-editable h2,
        .note-editable h3,
        .note-editable h4,
        .note-editable h5,
        .note-editable h6 {
            font-family: 'Russo One', 'Namu', sans-serif;
            color: #111827;
            margin-top: 1rem;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .note-editable h1 { font-size: 2rem; }
        .note-editable h2 { font-size: 1.75rem; }
        .note-editable h3 { font-size: 1.5rem; }
        .note-editable h4 { font-size: 1.25rem; }
        .note-editable h5 { font-size: 1.125rem; }
        .note-editable h6 { font-size: 1rem; }
    </style>
@endsection

@section('scripts')
    <script>
        var clearFormattingButton = function (context) {
            var ui = $.summernote.ui;
            return ui.button({
                contents: '<span style="font-size:12px;">Tx</span>',
                tooltip: 'Очистить формат',
                click: function () {
                    context.invoke('editor.removeFormat');
                }
            }).render();
        };

        $('#content-editor').summernote({
            height: 320,
            placeholder: 'Текст статті...',
            fontNames: ['Namu'],
            fontNamesIgnoreCheck: ['Namu'],
            buttons: {
                clearFormatting: clearFormattingButton
            },
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'table', 'hr']],
                ['clean', ['clearFormatting']],
                ['view', ['codeview']]
            ],
            dialogsInBody: true,
            callbacks: {
                onPaste: function (e) {
                    e.preventDefault();

                    var clipboardData = (e.originalEvent || e).clipboardData;
                    var html = clipboardData.getData('text/html');
                    var text = clipboardData.getData('text/plain');

                    if (!html) {
                        document.execCommand('insertText', false, text);
                        return;
                    }

                    var wrapper = document.createElement('div');
                    wrapper.innerHTML = html;

                    wrapper.querySelectorAll('*').forEach(function (el) {
                        el.removeAttribute('style');
                        el.removeAttribute('class');
                        el.removeAttribute('id');
                        el.removeAttribute('dir');
                    });

                    wrapper.querySelectorAll('p, div').forEach(function (el) {
                        if (!el.textContent.trim() && !el.querySelector('img, table, br')) {
                            el.remove();
                        }
                    });

                    var cleaned = wrapper.innerHTML
                        .replace(/&nbsp;/g, ' ')
                        .replace(/\s{2,}/g, ' ')
                        .replace(/(<br\s*\/?>\s*){3,}/gi, '<br><br>')
                        .replace(/(<p>\s*<\/p>\s*){2,}/gi, '<p></p>');

                    document.execCommand('insertHTML', false, cleaned);
                }
            }
        });

        $('.note-editor').addClass('rounded-xl border border-slate-300');
        $('.note-toolbar').addClass('rounded-t-xl bg-slate-50');
        $('.note-editable').css('font-family', 'Namu, Inter, f_inter, sans-serif');

        function togglePublishedAt() {
            var mode = $('input[name="publish_mode"]:checked').val();
            $('#published-at-input').prop('disabled', mode !== 'schedule');
        }

        $('input[name="publish_mode"]').on('change', togglePublishedAt);
        togglePublishedAt();

        const titleInput = document.getElementById('title-input');
        const slugInput = document.getElementById('slug-input');
        let slugManuallyEdited = slugInput && slugInput.value.trim() !== '';

        function slugify(value) {
            const map = {
                'а':'a','б':'b','в':'v','г':'g','ґ':'g','д':'d','е':'e','є':'ie','ж':'zh','з':'z',
                'и':'y','і':'i','ї':'yi','й':'i','к':'k','л':'l','м':'m','н':'n','о':'o','п':'p',
                'р':'r','с':'s','т':'t','у':'u','ф':'f','х':'kh','ц':'ts','ч':'ch','ш':'sh',
                'щ':'shch','ь':'','ю':'yu','я':'ya','ы':'y','э':'e','ё':'yo','ъ':''
            };

            const lower = (value || '').toLowerCase();
            let out = '';

            for (const char of lower) {
                if (map[char] !== undefined) {
                    out += map[char];
                    continue;
                }

                if (/[a-z0-9]/.test(char)) {
                    out += char;
                } else {
                    out += '-';
                }
            }

            return out
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
        }

        if (slugInput) {
            slugInput.addEventListener('input', function () {
                slugManuallyEdited = this.value.trim() !== '';
            });
        }

        if (titleInput && slugInput) {
            titleInput.addEventListener('input', function () {
                if (!slugManuallyEdited) {
                    slugInput.value = slugify(this.value);
                }
            });
        }
    </script>
@endsection
