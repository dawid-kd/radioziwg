$(document).ready(function(){
        $('form.deleteRecord').submit(function() {
            if (confirm('Delete this record?'))
                return true;
            return false;
        });
    })