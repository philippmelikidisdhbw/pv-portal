<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly
/**
 * Import / Export
 */
function qcld_sliderhero_sliders_import_export(){
	global $wpdb;
?>
<div class="wrap">

            <div id="poststuff">

                <div id="post-body" class="metabox-holder columns-3">

                    <div id="post-body-content" style="padding: 50px;
    box-sizing: border-box;
    box-shadow: 0 8px 25px 3px rgba(0,0,0,.2);
    background: #fff;">
					<div class="hero_pro_feature_export">

                        <u>
                            <h1>Bulk Export/Import (Requires the Pro Version)</h1>
                        </u>

                        
						<hr>
						<div style="padding: 15px; margin: 20px 0;" id="sld-export-container">

							<h3><u>Export to a CSV File</u></h3>

	                        <p>
	                        	<strong><u>Option Details:</u></strong>
	                        </p>
	                        <p>
	                        	Export button will create a downloadable CSV file for your selected slider.
	                        </p>

							<form action="#" method="post">
							  <input type="hidden" name="action" value="hero_export">
							  <select name="slider" required>
								<option value="">None</option>
								<?php 
									$table   = QCLD_TABLE_SLIDERS;
									$s       = 1;
									$rows     = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table WHERE %d order by `title` ASC", $s ) );
									foreach($rows as $row){
										echo '<option value="'.esc_attr( $row->id ).'">'.esc_attr( $row->title ).'</option>';
									}
									
								?>
							  </select>
							  <input class="button-primary" type="submit" value="Export Slider Data">
							</form>
							
							

                        </div>
						<hr>

                        <div style="padding: 15px; margin: 10px 0;">

                        <h3><u>Import from a CSV File</u></h3>

                        <p><strong><u>Importing in Another Website:</u></strong> Please note that uploaded images for Slides will not be copied if you import the CSV file to another WordPress installation.</p>

                        <p>
                        	<strong><u>Option Details:</u></strong>
                        </p>
                        <p>
                        	CSV file must be as per the exported format.
                        </p>
                        
                        

                        <!-- Handle CSV Upload -->

                        <?php

                        //Generate a 5 digit random number based on microtime
                        $randomNum = substr(sha1(mt_rand() . microtime()), mt_rand(0,35), 5);


                        /*******************************
                         * If Add New or Delete then Add New button was pressed
                         * then proceed for further processing
                         *******************************/
                        

                        ?>
                            
                            <p>
                                <strong>
                                    <?php echo __('Upload a CSV file here to Import: '); ?>
                                </strong>
                            </p>

                            <form name="uploadfile" id="uploadfile_form" method="POST" enctype="multipart/form-data" action="" accept-charset="utf-8">
                                
                                <?php wp_nonce_field('qchero_import_nonce', 'qc-opd'); ?>

                                <p>
                                    <?php echo __('Select file to upload') ?>
                                    <input type="file" name="csv_upload" id="csv_upload" size="35" class="uploadfiles"/>
                                </p>
								<p style="color:red;">**CSV File & Characters must be saved with UTF-8 encoding**</p>
                                <p>
                                    <input class="button-primary sld-add-as-new" type="submit" name="upload_csv" id="" value="<?php echo __('Import') ?>"/>

                                   
                                </p>
								

                            </form>

                        </div>

                        <div style="padding: 15px 10px; border: 1px solid #ccc; text-align: center; margin-top: 20px;">
                            Crafted By: <a href="http://www.quantumcloud.com" target="_blank">Web Design Company</a> -
                            QuantumCloud
                        </div>

                    </div>
                    </div>
                    <!-- /post-body-content -->

                </div>
                <!-- /post-body-->

            </div>
            <!-- /poststuff -->


        </div>
        <!-- /wrap -->

<?php
}
function hero_text_clean($string) {
   $string = str_replace(' ', '_', $string);
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

function hero_array2csv(array &$array)
{
   if (count($array) == 0) {
     return null;
   }

   ob_start();

   $df = fopen("php://output", 'w');


   foreach ($array as $row) {
      fputcsv($df, $row);
   }

   fclose($df);

   return ob_get_clean();
}

function hero_download_send_headers($filename) {
    // disable caching
    $now = gmdate("D, d M Y H:i:s");
    header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
    header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
    header("Last-Modified: {$now} GMT");

    // force download  
    header("Content-Type: application/force-download");
    /*header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");*/

    // disposition / encoding on response body
    header("Content-Disposition: attachment;filename={$filename}");
    header("Content-Transfer-Encoding: binary");
}
