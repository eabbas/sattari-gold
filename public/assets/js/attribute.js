
function createInput({ name, placeholder, type = 'text', className = '' }) {
    const input = document.createElement('input');

    input.type = type;
    input.name = name;
    input.placeholder = placeholder;
    input.className = className;

    return input;
}

function createButton(text, onClick) {
    const button = document.createElement('button');

    button.type = 'button';
    button.textContent = text;
    button.className = 'shrink-0 rounded-lg border border-rose-200 bg-rose-50 px-3 py-2.5 text-sm font-bold text-rose-600 transition-all hover:bg-rose-100';
    button.addEventListener('click', onClick);

    return button;
}

function createRow(className = '') {
    const row = document.createElement('div');

    row.className = className;

    return row;
}

function addAttribute(el, state = 'create') {
    const container = el.previousElementSibling;

    if (!container) return;

    const prefix = state === 'edit'
        ? 'attributes[newAttrs]'
        : 'attributes';

    const row = createRow(
        'flex flex-col sm:flex-row sm:items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 shadow-sm'
    );

    row.dataset.attributeRow = '';

    const inputClass = 'w-full min-w-0 rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:ring-2 focus:ring-[#425A8B]/10';

    const keyInput = createInput({
        name: `${prefix}[attribute_key][]`,
        placeholder: 'عنوان ویژگی',
        className: inputClass
    });

    const valueInput = createInput({
        name: `${prefix}[attribute_value][]`,
        placeholder: 'مقدار ویژگی',
        className: inputClass
    });

    const deleteButton = createButton('حذف', () => {
        remove(deleteButton);
    });

    row.append(keyInput, valueInput, deleteButton);
    container.appendChild(row);
}

function addFaq(el, state = 'create') {
    const container = el.previousElementSibling;

    if (!container) return;

    const prefix = state === 'edit'
        ? 'faqs[newFaqs]'
        : 'faqs';

    const row = createRow(
        'flex flex-col gap-3 rounded-xl border border-slate-200 bg-slate-50 p-4 shadow-sm'
    );

    row.dataset.faqRow = '';

    const inputClass = 'w-full rounded-lg border border-slate-200 bg-white px-3 py-2.5 text-sm text-slate-700 outline-none transition-all focus:border-[#425A8B] focus:ring-2 focus:ring-[#425A8B]/10';

    const questionInput = createInput({
        name: `${prefix}[question][]`,
        placeholder: 'سؤال را وارد کنید',
        className: inputClass
    });

    const answerInput = document.createElement('textarea');

    answerInput.name = `${prefix}[answer][]`;
    answerInput.placeholder = 'پاسخ سؤال را وارد کنید';
    answerInput.rows = 3;
    answerInput.className = `${inputClass} resize-y`;

    const deleteButton = createButton('حذف سؤال', () => {
        removeFaq(deleteButton);
    });

    row.append(questionInput, answerInput, deleteButton);
    container.appendChild(row);
}

function remove(el, id = null) {
    if (!el) return;

    if (id !== null && id !== undefined) {
        addRemovedItem('removedAttrs[]', id);
    }

    const row = el.closest('[data-attribute-row]') || el.parentElement;

    row?.remove();
}

function removeFaq(el, id = null) {
    if (!el) return;

    if (id !== null && id !== undefined) {
        addRemovedItem('removedFaqs[]', id);
    }

    const row = el.closest('[data-faq-row]') || el.parentElement;

    row?.remove();
}

function addRemovedItem(name, id) {
    const form = document.getElementById('editForm');

    if (!form) return;

    const alreadyExists = [...form.querySelectorAll(`input[name="${name}"]`)]
        .some(input => input.value === String(id));

    if (alreadyExists) return;

    const input = document.createElement('input');

    input.type = 'hidden';
    input.name = name;
    input.value = id;

    form.appendChild(input);
}

function calculate(operation) {
    const countInput = document.getElementById('count');

    if (!countInput) return;

    const currentCount = Math.max(1, parseInt(countInput.value, 10) || 1);

    if (operation === '+') {
        countInput.value = currentCount + 1;
    } else if (operation === '-') {
        countInput.value = Math.max(1, currentCount - 1);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const modal = document.querySelector('.modal');

    if (modal) {
        setTimeout(() => {
            modal.classList.add('opacity-0', 'invisible');
        }, 5000);
    }

    const countInput = document.getElementById('count');

    if (countInput) {
        countInput.addEventListener('change', () => {
            countInput.value = Math.max(
                1,
                parseInt(countInput.value, 10) || 1
            );
        });
    }
});
