
<div id = "add-idea-box">
    
    <?= form_open('idea/edit') ?>
        <p><textarea id="idea-box" cols="70" rows="5" class = "round" name = "idea"></textarea></p>   
        <p><input type="submit" id = "save-idea" value = "Mentés"></p>
    </form>
</div>

<div id = "tag-cloud">
    Cimkefelhő
</div>

<div id = "ideas-wrapper">
    
    <div id = "ideas-container">
        <h1>Ötletek listája</h1>
        <div id = "ideas">
            
        </div>
    </div>
    
    <div id = "idea-details">
        <h2>Ötlet részletek</h2>
    </div>
</div>

<div class = "messages hidden">
    <div id = "error-message" title = "Figyelem">
        Minden mezo kotelezo
    </div>
</div>

<script type="text/javascript" charset="utf-8">
    $(function() {
        $('#add-idea-box').find('form').bind('submit', function() {
            var self = $(this);
            $.post(self.attr('action'), { idea: self.find('textarea').val() }, function(response) {
                
                if (response.result == 0) {
                    $('#error-message').dialog();
                } else {
                    $('#ideas').prepend(response.result);
                }
            }, 'json');
            
            return false; 
        });
    });
</script>