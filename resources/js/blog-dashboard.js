import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

function slugify(value) {
  const map = {
    а: 'a', б: 'b', в: 'v', г: 'g', ґ: 'g', д: 'd', е: 'e', є: 'ie', ж: 'zh', з: 'z',
    и: 'y', і: 'i', ї: 'yi', й: 'i', к: 'k', л: 'l', м: 'm', н: 'n', о: 'o', п: 'p',
    р: 'r', с: 's', т: 't', у: 'u', ф: 'f', х: 'kh', ц: 'ts', ч: 'ch', ш: 'sh',
    щ: 'shch', ь: '', ю: 'yu', я: 'ya', ы: 'y', э: 'e', ё: 'yo', ъ: '',
  };

  const lower = (value || '').toLowerCase();
  let out = '';

  for (const char of lower) {
    if (Object.prototype.hasOwnProperty.call(map, char)) {
      out += map[char];
      continue;
    }
    if (/[a-z0-9]/.test(char)) out += char;
    else out += '-';
  }

  return out.replace(/-+/g, '-').replace(/^-|-$/g, '');
}

function initSlugAutofill() {
  const titleInput = document.getElementById('title-input');
  const slugInput = document.getElementById('slug-input');
  if (!titleInput || !slugInput) return;

  let slugManuallyEdited = slugInput.value.trim() !== '';

  slugInput.addEventListener('input', function () {
    slugManuallyEdited = this.value.trim() !== '';
  });

  titleInput.addEventListener('input', function () {
    if (!slugManuallyEdited) slugInput.value = slugify(this.value);
  });
}

function initPublishModeToggle() {
  const publishedAtInput = document.getElementById('published-at-input');
  if (!publishedAtInput) return;

  function toggle() {
    const checked = document.querySelector('input[name="publish_mode"]:checked');
    const mode = checked ? checked.value : 'draft';
    publishedAtInput.disabled = mode !== 'schedule';
  }

  document.querySelectorAll('input[name="publish_mode"]').forEach((el) => {
    el.addEventListener('change', toggle);
  });
  toggle();
}

function initEditor() {
  const textarea = document.getElementById('content-editor');
  if (!textarea) return;

  const form = textarea.closest('form');

  ClassicEditor.create(textarea, {
    toolbar: [
      'heading',
      '|',
      'bold',
      'italic',
      'underline',
      'strikethrough',
      'link',
      '|',
      'bulletedList',
      'numberedList',
      'outdent',
      'indent',
      '|',
      'blockQuote',
      'insertTable',
      '|',
      'undo',
      'redo',
    ],
    table: {
      contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells'],
    },
  })
    .then((editor) => {
      window.__blogEditor = editor;

      if (form) {
        form.addEventListener('submit', () => {
          textarea.value = editor.getData();
        });
      }
    })
    .catch((err) => {
      // eslint-disable-next-line no-console
      console.error('Editor init failed', err);
    });
}

document.addEventListener('DOMContentLoaded', () => {
  initEditor();
  initPublishModeToggle();
  initSlugAutofill();
});

