const tags_select2 = $('#tags-select2');
const input_tags_array = $('#input-tags');
let default_tags_value = input_tags_array.val();
let data_default = null;

if(input_tags_array.val() !== null && input_tags_array.val().length > 0) {
data_default = default_tags_value.split(',');
}

tags_select2.select2({
    tags: true,
    placeholder: 'برچسب های دسته بندی را انتخاب کنید',
    theme: 'classic',
    dir: 'rtl',
    language: 'fa',
    allowclear: true,
    multiple: true,
    data: data_default,
});

tags_select2.children('option').attr('selected', true).trigger('change');


$('#form').submit(event => {
    if(tags_select2.val() !== null && tags_select2.val().length > 0) {
        let selectedTagSource = tags_select2.val().join(',');
        return input_tags.val(selectedTagSource);
    }
});