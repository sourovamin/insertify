<?php

//dashboard main page function
function icp_main(){
    ?>
    
    <br>
    <h1><center>INSERTIFY: How to Use</center></h1>
    <center><p>Use simple shortcodes to put useful and amazing contents anywhere in your website!</p></center>
    <br>

    
    <div style="overflow-x:auto;">
    <table class="icp_table">
        <tr> <th><b>POSTS LIST</b></th> </tr>
        
        <tr>
            <td><b>Custom Posts</b></td>
            <td>Control posts type with specific category, number of entries and the title itself.</td>
            <td><textarea rows="2" cols="50">[ic-posts cat="Post Category" num="Number of Posts" head="Your Title"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Recent Posts</b></td>
            <td>Newly added posts of all categories. 5 posts by default and the title is 'Recent Posts'.</td>
            <td><textarea rows="1" cols="50">[ic-posts]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Random Posts</b></td>
            <td>Randomly selected posts from all categories. 5 posts by default and the title is 'Random Posts'.</td>
            <td><textarea rows="1" cols="50">[ic-posts cat="rand"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Example</b></td>
            <td>Last '7' posts of the category: 'my_cat' with the title 'My Posts'.</td>
            <td><textarea rows="1" cols="50">[ic-posts cat="my_cat" num="7" head="My Posts"]</textarea></td>
        </tr>        
        
    </table>
    </div>

    
    <br>
    

    <div style="overflow-x:auto;">
    <table class="icp_table">
        <tr> <th><b>USERS LIST</b></th> </tr>
        
        <tr>
            <td><b>All Users</b></td>
            <td>Show the public list of all users.</td>
            <td><textarea rows="1" cols="50">[ic-users]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Specific Users</b></td>
            <td>Users based on specific role. For the subscribers list, role name should be 'subscriber'.</td>
            <td><textarea rows="1" cols="50">[ic-users role="role_name"]</textarea></td>
        </tr>       
        
    </table>
    </div>
    
    
    <br>
    
    
    
        <div style="overflow-x:auto;">
    <table class="icp_table">
        <tr> <th><b>POST/PAGE CONTENTS</b></th> </tr>
        
        <tr>
            <td><b>By Title</b></td>
            <td>Show any existing page/post contents using it's title.</td>
            <td><textarea rows="1" cols="50">[ic title="My Post Title"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>By Name</b></td>
            <td>If you know the page/post name. Normally it is like, 'my_post_title'.</td>
            <td><textarea rows="1" cols="50">[ic name="my_post_title"]</textarea></td>
        </tr>       
        
        <tr>
            <td><b>By ID</b></td>
            <td>If you only know the page/post ID.</td>
            <td><textarea rows="1" cols="50">[ic id="1"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Random Post</b></td>
            <td>Show a randomly selected post. Write the name as 'rand'.</td>
            <td><textarea rows="1" cols="50">[ic name="rand"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Add Title</b></td>
            <td>Add page/post title above it's contents. Put 'yes' in the head attribute.</td>
            <td><textarea rows="1" cols="50">[ic id="1" head="yes"]</textarea></td>
        </tr>        
                
    </table>
    </div>
        
        
        
        <br>
        
        
        

    <div style="overflow-x:auto;">
    <table class="icp_table">
        <tr> <th><b>USER COMMENTS</b></th> </tr>
        
        <tr>
            <td><b>All Users</b></td>
            <td>Show the list of all comments by a specific user using his/her username.</td>
            <td><textarea rows="1" cols="50">[ic-comments author="username"]</textarea></td>
        </tr>
        
        <tr>
            <td><b>Specific Users</b></td>
            <td>Show the list of all comments by a specific user using his/her email.</td>
            <td><textarea rows="1" cols="50">[ic-comments email="user@mail.com"]</textarea></td>
        </tr>       
        
    </table>
    </div>
    
    
    <br>  
    
    
    <?php
}
//end of function

?>