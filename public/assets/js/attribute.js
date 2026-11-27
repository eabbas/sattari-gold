
function addAttribute(el, state) {
    if (state === 'create') {
        let div = document.createElement('div')
        div.className = 'flex flex-row items-center justify-between gap-4 mt-4 border border-slate-300 rounded-xl p-2'

        div.innerHTML = `
            <div class="w-full flex flex-col sm:flex-row items-center gap-4">
                <input type="text"
                    class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                    placeholder="ویژگی" name="attributes[attribute_key][]" required>
                <input type="text"
                    class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                    placeholder="مقدار ویژگی" name="attributes[attribute_value][]" required>
            </div>
            <button type="button"
                class="p-3 text-sm rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                onclick="remove(this)">حذف</button>
        `

        el.previousElementSibling.appendChild(div)
    }

    if (state === 'edit') {
        let div = document.createElement('div')
        div.className = 'flex flex-row items-center justify-between gap-4 mt-4 border border-slate-300 rounded-xl p-2'

        div.innerHTML = `
            <div class="w-full flex flex-col sm:flex-row items-center gap-4">
                <input type="text"
                    class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                    placeholder="ویژگی" name="attributes[newAttrs][attribute_key][]" required>
                <input type="text"
                    class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                    placeholder="مقدار ویژگی" name="attributes[newAttrs][attribute_value][]" required>
            </div>
            <button type="button"
                class="p-3 text-sm rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
                onclick="remove(this)">حذف</button>
        `

        el.previousElementSibling.appendChild(div)
    }
}

function addFaq(el, state = 'create') {
    let div = document.createElement('div')
    div.className = 'flex flex-row items-center justify-between gap-4 mt-4 border border-slate-300 rounded-xl p-2'

    let questionName = state === 'edit'
        ? 'faqs[newFaqs][question][]'
        : 'faqs[question][]'

    let answerName = state === 'edit'
        ? 'faqs[newFaqs][answer][]'
        : 'faqs[answer][]'

    div.innerHTML = `
        <div class="w-full flex flex-col sm:flex-row items-center gap-4">
            <input type="text"
                class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                placeholder="سؤال" name="${questionName}" required>
            <input type="text"
                class="w-full outline-none pr-3 py-3 bg-[#F9F9F9] rounded-xl focus:bg-[#f1f1f4]"
                placeholder="جواب" name="${answerName}" required>
        </div>
        <button type="button"
            class="p-3 text-sm rounded-md bg-rose-500 hover:bg-rose-600 text-white cursor-pointer"
            onclick="remove(this)">حذف</button>
    `

    el.previousElementSibling.appendChild(div)
}

function remove(el, id) {
    if (id) {
        let editForm = document.getElementById('editForm')
        let input = document.createElement('input')

        input.type = 'hidden'
        input.name = 'removedAttrs[]'
        input.value = id

        editForm.appendChild(input)
    }

    el.parentElement.remove()
}

function removeFaq(el, id) {
    if (id) {
        let editForm = document.getElementById('editForm')
        let input = document.createElement('input')

        input.type = 'hidden'
        input.name = 'removedFaqs[]'
        input.value = id

        editForm.appendChild(input)
    }

    el.parentElement.remove()
}

let count = document.getElementById('count')

function calculate(state) {
    if (state === '+') {
        count.value++
    }

    if (state === '-' && count.value > 1) {
        count.value--
    }
}

modals.forEach((modal) => {
    setTimeout(() => {
        modal.classList.add('opacity-0', 'invisible');
    }, 5000);
});