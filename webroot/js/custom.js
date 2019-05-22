$(function(){
    hideChoicesContainer();
    $('#field-type-id').on('change rightnow', function () {
        if (this.value == '3') {
            displayChoicesContainer();            
            if(!addPreviousChoices())
                addChoiceInputBox();
        } else {
            hideChoicesContainer();
            emptyChoicesContainer();
        }
    }).triggerHandler("rightnow");
    
    $(document).on('click', '.add-choice-action', function () {
        addChoiceInputBox();
    });

    $(document).on('click', '.remove-choice-action', function () {
        $(this).parent().remove();
    });

    function displayChoicesContainer() {
        $('#dropdown-choices-container').show();
    }

    function hideChoicesContainer() {
        $('#dropdown-choices-container').hide();
    }

    function emptyChoicesContainer() {
        $('#dropdown-choices-container').html('');
    }

    function addChoiceInputBox() {
        var html = '<div style="text-align: right"><input type="text" name="custom-field-choices[]" class="dynamic-choice" style="width: 80%; margin-left: 20%;" required ></input><a class="add-choice-action">Add</a>    <a class="remove-choice-action">Remove</a></div>';
        $('#dropdown-choices-container').append(html);
    }

    function addPreviousChoices(){
        if (typeof previousChoices !== 'undefined') {
            $.each(previousChoices, function (key, value) {
                addChoiceInputBoxWithValue(key, value);
            });
            return true;
        }
        return false;
    }

    function addChoiceInputBoxWithValue(id, value){
        var html = '<div style="text-align: right"><input type="text" name="previous-custom-field-choices['+id+']" value="'+value+'" class="dynamic-choice" style="width: 80%; margin-left: 20%;" required ></input><a class="add-choice-action">Add</a>    <a class="remove-choice-action">Remove</a></div>';
        $('#dropdown-choices-container').append(html);
    }
})
