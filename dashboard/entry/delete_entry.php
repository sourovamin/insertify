<?php

function ic_delete_entry_func($id){
    
    global $wpdb;
                        $table_name = $wpdb->prefix .'insertify';
                        $delete_row = $wpdb->delete( $table_name, array( 'id' => $id ) );
                        
                        if($delete_row){
                            ?> <script>
                                    
                                    alert("Entry Removed!");
                                    location.reload();
                                </script> <?php
                        
                        }
    
}

?>