<?php

if ( ! function_exists( 'ocdi_import_files' ) ) {
  function ocdi_import_files() {
    return array(
      array(
        'import_file_name'             => 'Demo1',
        'categories'                   => array( 'Demo1' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demo-content/demo.xml',
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'demo-content/images/layout-demo1.png',
        'preview_url'                  => 'https://minemo.preyantechnosys.com/',
        'has_slider'                   => true,
      ),
	  array(
        'import_file_name'             => 'Demo2',
        'categories'                   => array( 'Demo2' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demo-content/demo2.xml',
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'demo-content/images/layout-demo2.png',
        'preview_url'                  => 'https://minemo.preyantechnosys.com/demo2/',
        'has_slider'                   => true,
      ),
	  array(
        'import_file_name'             => 'Demo3',
        'categories'                   => array( 'Demo3' ),
        'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demo-content/demo3.xml',
        'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'demo-content/images/layout-demo3.png',
        'preview_url'                  => 'https://minemo.preyantechnosys.com/demo-3/',
        'has_slider'                   => true,
      ),
    );
  }
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

// Automatically assign "Front page", "Posts page" and menu locations after the importer is done
// Import Revolution Slider if plugin is active
if ( ! function_exists( 'minemo_demo_after_import' ) ) {
  function minemo_demo_after_import($selected_import) {
  	// Assign menus to their locations.
  	$main_menu = get_term_by( 'name', 'Main menu', 'nav_menu' );
    $footer_menu = get_term_by( 'name', 'Footer menu', 'nav_menu' );

  	set_theme_mod( 'nav_menu_locations', array(
  		'preyantechnosys-main-menu' => $main_menu->term_id,
        'preyantechnosys-footer-menu' => $footer_menu->term_id,
  		)
  	);
	
	// Import custom configuration
	$content = file_get_contents($selected_import["local_import_file"] );
		
	if ( false !== strpos( $content, '<wp:theme_custom>' ) ) {
		preg_match('|<wp:theme_custom>(.*?)</wp:theme_custom>|is', $content, $config);
		if ($config && is_array($config) && count($config) > 1){
			$config = unserialize(base64_decode($config[1]));
			if (is_array($config)){
				$configs = array(
						'page_for_posts',
						'show_on_front',
						'page_on_front',
						'posts_per_page',
						'sidebars_widgets',
					);
				foreach ($configs as $item){
					if (isset($config[$item])){
						if( $item=='page_for_posts' || $item=='page_on_front' ){
							$page = get_page_by_title( $config[$item] );
							if( isset($page->ID) ){
								$config[$item] = $page->ID;
							}
						}
						update_option($item, $config[$item]);
					}
				}
				if (isset($config['sidebars_widgets'])){
					$sidebars = $config['sidebars_widgets'];
					update_option('sidebars_widgets', $sidebars);
					// read config
					$sidebars_config = array();
					if (isset($config['sidebars_config'])){
						$sidebars_config = $config['sidebars_config'];
						if (is_array($sidebars_config)){
							foreach ($sidebars_config as $name => $widget){
								update_option('widget_'.$name, $widget);
							}
						}
					}
				}						
			}
		}
	}
			
    // Configure permalinks
    global $wp_rewrite;
  	$wp_rewrite->set_permalink_structure( '/%postname%/' );
    flush_rewrite_rules();

    // Import Slider Revolution
    if ( class_exists( 'RevSlider' ) ) {
		
		// List of slider backup ZIP that we will import
			$slider_array	= array(
				plugin_dir_path( __FILE__ ) . 'demo-content/sliders/drawer-section-demo31.zip',
				plugin_dir_path( __FILE__ ) . 'demo-content/sliders/mainslider2.zip',
				plugin_dir_path( __FILE__ ) . 'demo-content/sliders/map-section.zip',
				plugin_dir_path( __FILE__ ) . 'demo-content/sliders/demo2-main-slider.zip',
				plugin_dir_path( __FILE__ ) . 'demo-content/sliders/demo-03-main-slider.zip',
			);

        $slider = new RevSlider();

        foreach($slider_array as $filepath){
          $slider->importSliderFromPost(true,true,$filepath);
        }

        echo ' Slider processed';
    }
	
	
	/**** Breacrumb NavXT related changes ****/
	$breadcrumb_navxt_settings						= array();
	$breadcrumb_navxt_settings['hseparator']		= ' &gt; ';  // General > Breadcrumb Separator
	$breadcrumb_navxt_settings['Hhome_template']	= '<span property="itemListElement" typeof="ListItem"><a property="item" typeof="WebPage" title="Go to %title%." href="%link%" class="%type%" bcn-aria-current>Home<span class="hide">%htitle%</span></a><meta property="position" content="%position%"></span>';  // General > Home Template
	$breadcrumb_navxt_settings['Hhome_template_no_anchor']	= '<span property="itemListElement" typeof="ListItem"><span property="name" class="%type%">%htitle%</span><meta property="url" content="%link%"><meta property="position" content="%position%"></span>';  // General > Home Template
	
	// Getting existing settings
	$bcn_options    = get_option('bcn_options');
	if( !empty($bcn_options) && is_array($bcn_options) ){
		// options already exists... so merging changes with existing options
		$breadcrumb_navxt_settings = array_merge($bcn_options, $breadcrumb_navxt_settings);
	}
	update_option( 'bcn_options', $breadcrumb_navxt_settings );

	/**** START - Edit "Hello World" post and change *****/
	$hello_world_post = get_post(1);
	if( !empty($hello_world_post) ){
		$newDate = array(
			'ID'		=> '1',
			'post_date'	=> "2014-12-10 0:0:0" // [ Y-m-d H:i:s ]
		);
		
		wp_update_post($newDate);
	}
	
	$theme_options = array();
	
	$theme_options['Demo1']	= 'eNrtPe2O20aS_wPkHToK7hBjhzPihz491sbrfGywWdsXj7F3OARES2yJzFBsLkmNrBgG7jX2EfY17lHuSa6qv8imKM7YzuQ8wMV2Ruqurq6P7uqq6lwih8692Xj-tpzP5oPyOslWPOXF4HE5n8wHXzLfX3pT_OYG0M1WPItocbBghuI_ATNrwDibgtmAa7qerAP8Np4PUnrguwq_XDDifRIxgWA6H6x3aRpiQ8hStmVZVQ4e07k7f5vMh3JozGjEXDDrOxhcMHg3KV_SNFxc0tX1puC7LEL4CXI0mg-SLd0I1MP5QNEhmpKo0Qg4C5YzWjXagJKcl0mV8KzR6sJPWlV0FSNljQ6UTvJrcyaY3OZe_FwnqYYJkyxjxYNcIhqQbwoaJYAjFEAhz5gBZKPx0Nc6bMFVe14jnKzlYoG1knJUZLLdNImd1u3AcrjalRXfNgH8-VwwJg5z7AVegYTl3MUODyZmIFVYDGuOjFJk_a0Q1Zpuk_SgpfGX3XYZk1c0KzVGVMQud2owDwZd0Zhv6Rn5HrDewM8SBjglULZW7NzQXCKhUqQTVMdml9JC75aKvamcqoAxa140OVwwzpE-R8se6HbHYpQLvFwnGXNilmziSvV5Y40xZVXFCqfM6SrJhNBgwLBLbyMP_wyUVGiaOkiq3EwCqVxcIIGkRC2nDeeblAlle0DqMgWZJGUcLndVxbNTe34oaL52TD9gqpUm1Gm6nYaIWmjGFlxczG9YlxECPmM3RANcMAIwWp4dKRlE_JeCZ5S8kEu0W8VA21NQYHpG_szSG1Ylq3tVsj86reRg9P5KrqV3Uo9CYN6DFZjfIzD__gTmP1iBDXsENrw_gQUPVWBej8D8exTY6KEKzJ32HFTT-xPY-MEKrMfoe-79CMyTPvIDlNaoZz-O72c_eh5SXFyi33zDWqusdjoBcblbftJShal3ec6KFS3ZqcUY9CzGoFe83kcsRogIK4wGTovtrk757715780tPy0vV4TDG1b9_1l6--ICvlWWIKySClvpfPyQTtJe1tZLWjjNgB5mjNia7tJKs4Eg4XITnoi-RhqiP88wxaxKVeXl_OJiC8rb8vO8YAfgk63ijJeH8nzFtxf73FFb-aKKQerlxXoH8XbCLwQm-AqRewVqRbqXm_Nf8s3d0hcgnow79fcPz2OIRaRix_aCmrAlxRzFu4ZgUGO18GDeiBbXmLkSWvIsKCHW0EIZRb6vopSJgo1pFqWsCJOVJN6HqS4TskppWT4Z5EXlKKE5COFU8WBxeZEsxHx-B45wlXJp0P1pLyYJZ5AZFiUSTXUgWbRIXlbZ6TXkBS2oDjHUW9XTsyobBmC7bRbW2T5gcRoGRrrNBVMwep3zJNNZQddTOGenXDCdmswGPHJe8by9MzqU24BqcYV7q4DZvhqeiT-PtMDUEHvdwIT7WKSipLwsoBZmzzWYCfz1RiP4ee6NxAyYd2kORttwfH6PDVDK1pWAlBzB6MtdqlcIwIj9SlcVLIs0WVxcgtXNmuunzvcufuSrisJ-I3NyeYFwC5bdgAHgJP478QKyTtZVfEYocFPQNKGXF4jwFqTfbmmS1hgvKYkLtn4ywOaKz5Nszb9mb-g2TxkamMGi3XJ5QRdypotdumjpoMADxnDvjkYfzv0VTa_JFVwn374BB6rqoLhiKbgyfjAaT6az4WDxh6FLvnID_xGBJgJtM0PqfwrcfAVHiYMprfLnDuJ7VnvQAXNioSM6PPbaS725HjEpXwP9RvnmWww27p4V2GhWEPnjY803MiE2jTs584IzH3bk-dB9JG150GCwrA4p6zgqm0Kw927DIOLWNFAPNIKa9Hhh0w_wwryhN_PW_RGUpYC7REkP0d2f3r_scL9HqwIE82muOlTbiuZJBQfAr-x3EuJ4OmYT_1Zf2QjxJmH7DgMwsra2psnHBM1YOy51GqADVDuhgFfqabftcZrGGkpos8vBGNsOxvlI-hjWgojxGrTGo6SYcc0RjW7CCgFXtKLFSlu6Z7RiG14cyNNiFQM75ZwcjajoRo8I8KZr0wJGX9RcMINUKnFwJuuERZrMl9BakrqdwLHCCjXXtDGc7qqYF3o6EOBT0dAmz9dXuy0FecarU923eHUNqLbQ9THijc98OEZmIPeJ_0hrDA4e3ChpqDF8Kreztx6LbX5gU_i-WtCZSWx1C6XlwE-NXDAbo-0YouleiOvaDa8Ouaa0jipVl3LQYJ7vZLxirn83vMfQAf-vDp9SfqPPsE3uJb8xkUISN-QU9sJbMZlcXGgwaDobB4rYKgb74OyKVGB_73B-l-Ode3kBXCeWfzF0L3BWcF6BwfPyZqOUiZUZ9zeFisrFotjSN2HX9aheNFu-PAkDS6WEpXB9CHWdiCwPwODIMi-hBNNWRi1_rzX8pF-NUekx5EmD457Jv8Pz2fiRWSxSuYaSto7rxWjpt7ZcJ02ViFaV0G5JscFqnWRHThkY5ThMsnxXae6vYFwnk7_xXCJcIlcxy8i36L6fn-sjS47AzaITbrUhmxkBK7zLDU3TTyHQwKRE8oZF72tW_dGZ_AtaGz0y-VnJpQk1ZljNs4bDECyUNhFKECY4nQIQBJON6PNmFapqFaK-LqvMb34WxsfZRnZbTHPmiEOJtXqQHmed0spq3osV4GTcapVlFrpOZ6Ci3C8HRGj1yWCw-J5V5Cn5tx3Ybwxt9aG_hJWBa52lfK8XPgUPRYk2UzVBbn2MyPIRIwqlZc9tA2CsbC_wY5jlphm3YVwwP7C3Nmh8FzZXCLp1xkjUzkGZJvgD81wnbcKGDXXq_JXiqg9EFTlpEK8LBKTMWvzVQHmMZU1IjbwWHI560jmffyZSGlY2UNphmQzMQTJcIhV4lPUQ7C6eRhEc7-VcXOU53KlPvoGgouLkJXhTe3ogr189hUkwoSHmaqLIwBbBrumbHnnpJeAZmAby2hBgJVq84XQ0Gg1d15vOBouv4OsjAg0OtpBpnWlB-nYp_DiiUKVf1nTFlpxfDxb13iMV52mV5A7IE77QYsOqXCeDcJnS7FrvA32y7ff7c41DnGetM86dDUgErrejcD4ZfGdm_O5Pp8XToAsl1OCnk42rfYJOxYdyUcnhgoGXgoErzUCbfDPT1d9OU18Zcu5C_I-wrVn0Q_YxOkgFjiQTLCSZUoNj9ODkN5WTVtFFm5968h-en2ZIo78jR1GRLJfLlL0vR1-eXizf9CyWxnRN6o4NUW1AxNnqihPHFmaPq6ZMi-NegLCyv-8SiB-f833T9ivbqVL7PSlwz7LHeDzYrppMUrXN9uloenIM2Ha0JtrRAh9rJP6qeHrSdtOO5mqFkH5wckQ7lT_UWUlvBr7d6Gw8xlww7JFybdAJKxnXLknsxnzLeKZSYCAwifdUXCIYWdqyDUUoB92UQlRJK2_WOxp-XCJHjIA0yRD4wZYteD2Rl3c_VSEmjGgKr7M2WuYONFgIewgjZrQpYZezgnF5N3BvXFyOzndU8Dzi-1t0eW_JVR9Dh-FvXgTl3UsdhafkdVpcJ5aJQa10g3dopVGQPGsM-70uV4Ym5sHD5je4GG9U-fvDToYauaAHxpveQW3exOnVyHCd2tp-ve3kOVCynBbgKBdWNhZdeW2szQGpK1IeSqlin5m9p-I7t3u5uZ_e4zAmvXKCZO_hkew_PJKDh0fy6OGRPH54JE8eHsnTh0fy7BMm2TtxlAw_XZpdcTByOE_DVUXDJX9j4ju7p6uMbhyOTRmdhUNByyxcIl5TXFxGyY1VNpgUJfxfDBKpxNhb_Miq__mvf5SkrGhRgfMFDkzMivPLC-hDCH_xEwTDB-gh0EG2vKwul8WCXDA9hK8J0FWQFcSi4DlcJ9XhjwQG-lwiQQdzL3rp9GTQPTymUyRuO6kl34K7d6hi8EBwapIxFiFpy12SRpKYlGZYhULwOVECn8mWXsMHskFcIkmyzTH_Cdo0LLbzlJhJHyw-NIXyTH4mr0tcIlM2XCLN2TGNTKh_2ETehczTv0KlgQTsmW4Xvd-6vmkC9dyxj48gW0FSgI9cMCtg1wLuSRoN1bPfCrqHXDDzmHgNeuqiaTr82HtKOYe4d3GG7nmeddQ0A78z3w8-4vZqyStds_0RAY-xK7XCTxTECR3ixtIyPLIwXDDvhx78GRk1NuGb6sGQQcQYEBkpmsVqasH_jpeBv404RQ3XyIt8z-SELJ56FnObfRUSQvDIOoLHiX5vwkltmPBMXFxQW7C3aAL31dGAT-Re9u7vIRitp2tqKuZsfk6rwT_ivVcPvte436z2jGVqmBrVcc_piSG42O5gt8RT9W3gT_uK_IQ-mrtcImgz1bMtGocBzw-ygBvvYHWGU9ROSwj0435un15mkLnTncH0z3Qz-e9_ErTb5D0O08EC-hKOR-c5eZqmRGAqCbgHrLhh0bneoWpl0CUX6VwiTUnX5TewqS6sdZp2_Cmn3PvTOr21q_pyn-dqDeQ0ihQCkzaSlxVRghWTtViOM0-ewVwnqhw0O7LWwRRf1tUCoXlNxFirR59tpra_WX7Q-RCMSfSXSYRFl-Z1XCIjfAUG38jlnCbbpLLqZ3xX9sv6xxWQzPewLLbiYTR1Q65RTRUqrOTc8qK-pANNoFtN_gqN6rtcMNRFrLgmMCiQOsKu2nlT_XrNeXW_Hi3ezQG7yzFGRVOCUEd8TVwnOuOJ9Z6hvO1EVRTsqNgHZXwMhTsmWTHxxp5Av7EHnTV90fk4EQLB5xbUJTK0eNJKbPJ0V-J3XwpcIk_QWrGyMhFpU9xbBt5kmpRid3m4u1wwKcvoMmWRaULTXCeNXCKKQpXFJqw0a0CaJfj4jfj4TprspDRofIWmohsFeUU3pVpysq5VfXlqvkzQWG61YZ2ifdqqFxm9e6dsSZsTJAW3pxVzekEHJFCCa78ZKB7BXDDTFkzXjJL4Jpg7qRfHbeL1P0S8_aI5kr333rJ_p7w0i4tu0Q5bUG2xtvvbXCJtz3IsTqwoz3lRrXma8DAv-C9sVYURXDBcJ2nZCrxqONy7xmcPZJyjbWgNJYxNwSBCRVHVJNUQqrPeuHi8_iQbyUtJTGmeR1PAe15cXEesXFwdFWt5Xai1mUFzixS7es0eg9YWC-vwdRlUN1rkTZ0_vrllbxMIsWTr8fx8rWWLZwNTixRNkFpJyGgLqJYOLEwllHrx0tYt4Ts0XndBBgoluga_F513Z3TkWWpe33QCnTItrUXStM9mpUwtsE47DxJ9JcfI3Z2vYQd0qxyPHtldq1k4DbvCHt3Q7Mw868DoNoTVVlCL-1IZgKb-ZlwnoWuyAePTDSN3VOJdMKIzXCceCwT5r3oxq8AbMZ6WVVADdG-KJoojgU1k35ahe6EJFoe5Jhd3y0tWlOBZpuSHTBo-HQpMFb-3-iGuiEjlYR42mZkqZrTXMWvBWa6JKok8QnbElmtcMG5cJw2NBisKXgTDIEzodsO0MyMtAcx7GQeLoJlMFPDgBW2coYtli9sNKYvVk4_MDAEBgElkhAhNq1wnA6zTX8i0W3B5AUSQy3i0ePHi5asvMB86Ms-AGvqXyaZ-fBc4fcWL4kD2jKyADrJOsohUMRb0gv_2hVavGa186raxDhog4i15txQmTEYfmyNbbmAulG_3I_8j9PBd-fTh_-ljpM23UL7T77TEUvUMFlepHxXD5YgJ7-dcXCaY1yg5kc--zBdCQ2cEogqSqX7YYKuYqbSzxEcwgC3PycuUQYxFKlAq3dAkI-D1xqTkW0aiZL1mmKQh1-xcMOdaVJ5fXuQLU5ovoxHx6FW7jtnqV0q0-md1v9jv0l7YOadRXCdMiOskV-I0kfmkSY86N2xs4w4I3OvNM9Cga0yttn0LQuR4bIiTyCxQlL39lFxcQxR7zoXzWayOJCYSRRoL6DRlYuP0jGgysVxcisuEI5AGaexGn94WBApWHr9Y6lkajzuwTj7BhDqllTQyutXPWNXBVVwnpHRJhbH90j7-etA2A7S7YfXuRqwpZr0jWv9uaE0F753Qqq2_XzmywNOR7-qog_WG3p36RDMOaQsCXFz7aLeqHPARHL0d9dEm1lwwHHdOzCtcJ6VLlpp5sKBWNzrahoPF-zOvFxiOLGnK7KF4CKhJQ-wNU7bUD-CphI_BYAabKfC5OpqasxSkIFe8I2ZrBxVBE0J1dsnE74bbqetcMAWGutnhSq8KID7BvIx2XFwwn3IVXCclwXe6Evj5Gp8mJc8awNqHsTHE1VZGSOLob5z6u8zBQkuhE310iQtEG6arW77EAQt4f5bnuT2qZLmIMRamM3Z1n3r6fbB4_fybb39cIs9ePH919dPrZ1c_vHgOZ4grgAODyDwtP4CTBQJJcaDQPRNHRIXiwGcxYKkxOE1eVfC52mUs-kK4F_qOz7rrC9ryebhliUv8Yy73ba5WJfiSXFy-NnrmA6FfXCdbPHnIrki_Mu6MyDOey5wlzRN1e1qWf5Qp1lwnL3KW_QHLZOEEGJ7Bv-QsgA8BfhjDhzF-mMAH-JcMHj3-_LMljw5vP_9MpTnnZAhtW1pskkx-fkc-_-xcXOn0jJzXCn4LHaLiTk49XCeDAc4ui3TPSF-Wt4X2rUKEMpyT8TB_A1wwjZI9aBtBG4ywk7pz4grQJrnysyOTt_PPP0NkxG4k7lQME3Pu9QxDHN3G7wlAocQ5-dKb-tFoCg1EUN8QhcWA5x8z4A8tTFNvupqNH9-FIYvKDKOfVIuvyx6gVvQqnhO6LMGyVUzMtAYEo-G_wGdYz3MSjPCjc43mpk6nz4n4iObu379yXDD8Ud3wH7IBR235r-83huCg8r3n4e874j3ByTuQo3gUZiWsI4qvtVoCqbooKfOUwjJPMqHZZcpX16gJ87ZnDqN-N-PkKa_rN7wZhjAC_pgXUOTrEM9gK23zYplUO50RFdmuJpDwNPVNTRvabUCX6W6jYHgHDIbUVvxvEBE7XCerskwG3lwiXDAP1qOBB50BUcM0JQhsSHGarjn2aLfLlgfI7FXt7XuTLjiLXCJ7gNseoGmp29tglmCQMIWuLZZxxxBbNuOjsYf6ieh6pBFP3W4LZ6QSMLZkUI9X0Ez-KmKw0sqNnRAOKqUxpplbssUjSgKg1amDQPECMQQUwZ6d6hI4v8f2UoeJbVCbjmFzjMWkHGLoGCo6TISJuwZzMuIxZ0ymm4uFkXgHZhXrZ5ncic4dWG8GmZrq8lUhXQ5oPLDS_L4CC7sjQ8aOKWDUZDzpmiGYtmdQkaX63RP2BMLv6cY_drvxTyZ35KARd5-aoVNGk1GPjMTzg3oGa5F0zxGMOucY9eoBn4ReiRvbZUGLQyOxq0M3rNAom3eDMdsm64N5XCeELi9ruHw68R-Y3l-OO81QPLPFw3xyZ2GcgCEhgTgFi_Bw_gxT_62igS7vUbxL7s5Dy4qCM1wnxhGQTVmC0YFjT-G4fTb0VT3trIqHuqS3ugfhfw1e6mMQ_WP0xcA__Vd15D4p9zQfSAJFrraMGYPIRp8ODZGgMysKPlu_gKMFwrKo9dS6PLx79DI70lqoogIfH-YEzAS8QEJKkEqaOksW05sEfb1yy3kVa0cBf1GKcOtbuFu_YEQmlJdiSeGSXDC9yN8hYvXM1KspLWhXRtmhfOWebsZwVr8cUpZ9YCClXFwHBTK0XvF03B_Yr4BSdUUWTOOVRzp3pTomiizZK2sYTKd5R4kqilXtGEGfuNapL-YVilEjR9yaut5wKnlVtn77ihWI6WH4CGSSiV1b8y_eXxWxLQ_1K6B5Xg9697-EzM4B';
	$theme_options['Demo2']	= 'eNrtPf9u20aT_xfoO2xV3KHBZ1pcIqnfcfQ1l6Zt0DYJGgffHQ4FsRJXXCJrimTJlR01MHCvcY9wr3GPck9yM_uLS4qi7STuxcA1SS1xZ2dnZ2bn1-7SdO7NJvP35Xw275UXcbrKkqzoPS7nk3nv68Eg9NZr_OYOoZmtsjSkxb4Bg_8JmJkF42wKVgdcXLvr8Zrit_G8l9B9tuP4BRBfxSETCKbz3nqXJAE-CFjCtizlZe8xnbvz9_F8ILtGjIYMsF5DB1djCvg-FzhGgC6KucQHw26SbEmTYElXF5tcItulIaITEwbIeEs3AnIw7ykyxaM4tB7CkAXLGeXWMyA0z8qYx1lqPXXhXCflnK5cIiTcakDmxX_aI8HgdeaI_-SkYMA4TVnxoIgG5JuChjHgCARQkKXMXDCy0XjgaxE34PhVViGcrKUugSolGco53m5sYqfVc5hysNqVPNvaXDD-vAcDBzm2lkIPlnMXGzwYmAFXQRnWGU6U4tTfC1at6TZO9pobP-22y4i8oWmpMaIgdrlTgXnQ6ZxG2ZaekB9cMOsl_Cyhg1MCZWs1nUtaxFSydILi2OwSWujFxNk77vAC-qyzwp4BzBzpczTvgW53LHqhsscpc1wiFm9cIq7avLHGmDDOWeGUOV3FqWAadBi0yW3k4Z-e4gpNEgdJlWtNIJUKMpSUKHXaZNkmYULYHpC6TIBcJ3EZBcsd51l6zCQMBM0XjmkHTJXQhDhNs2OxqIFmXFyDi7JL1majYJ6RG6B9XDAGGCnPDoQMLP6pyFJKXkkVbRcx0PYUBJickB9Zcsl4vLpXIfuj40Ieju4u5Ip7R-UoGOY9WIb5HQzz749h_oNl2KCDYYP7Y9jwoTLM62CYf48MGz1UhrnTDkc1vT-GjR8swzqMvufeD8M8GUI_QG6NOtbj-H7Wo-chxSXGzZesoWVV0AmIy93ys-YqDL3Lc1asaMmOKeOwQxmHnez1PkIZIWHkmA0cZ9ttg_K_evHeW1h-nF-uyJY3jP-_L71ZuWDeqogQ8JjjUwogD8iTdk5tvaSFY1wn9DBiyNZ0l3A9DQQJlpvgSPY10hDddYYpFl04z8t5v78F4W2z07xge5hcJ1tFaVbuy9NVtu1f5Y5ayn0eAdfL_noH-Xac9QUm-AqZOwexXCLdy83p7_nmduULYE-aOdX3D69jCCVSuWNToSZsSbFGcW0xBiVWMQ_GDWlxgYUtISWvBiXYGtRQhqHvqyxlomAjmoYJK4J4JYn3YaizmKwSWpZPennBHcU0ByEcHvUWZ_14IcbzW3AEqySTBt2fdmKScAaZmaJEoqkeyinWSF7y9LgOecMGVAsbqqXq6VGVDQOw3TYNqmIgTHEaDA13bYUpGL3IszjVRUPXUzhnx1wwnYpMCx5nzrO8uTJahGtBNWaFa6uA0b4ZnIg_jzTDVJe63tglSeRXDaiB2XMNZgJ_vdEIfp56IzEC1l3szmgbDv332FwwJWzNBaScEfQ-2yVaQ1wwRqxXuuKgFkm8OAOrm9r6U5WDFz9nK05hvZE5Oesj3IKll2BcMDIS_UG8IVnHax6dEAqzKWgS07M-XCK8AenzLY2TCuMZJVHB1k96-Jhn8zhdZ9-yd3SbXCcMDUxv0Xxy1qcLOVJ_lywaMijQwZjZu6PRh8_-nCYX5Dwjz99BXDDFWyjmLIFQxh-OxpPpbNBb_G3gkm_cof-IwCMCz2aG1H8XuLMVuBIHS1rlby3Ed2j7sAXmiKIjOnR73U5gZkPd4Aimt3IEITR4tjvY5VizLftYjy37o7438Pz-wOvrcdtdAYzs-tPB5K7-XDAX5wqGZQWRPz7WOyCLxJp0XCdcJ97wxIcFfzpwH0lXMbTYV_J9wlo8sc3iDtPgWmAPNEObdER50w-I8kBTZt66O0OrSeA2WdhDTFwnpvfPO7RcJ-GqXDDGfJ5ah2Jb0Tzm4GD-ZH8RE8fTMZv4N8bihomXMbtqsVwwo9rS1jT5mPqYwKgqM7SAKrVBgVlyWmZFiPuEGRfWXFztdE00zG7bEbiN65hagpxxPcg5Hck4p6Y0Ee7UVnjUrPas1NOm4WXAEXJFOS1W2h4-o5xtsmJPnharCOZcXM7JQQ9ON7rHELfbNg1gDIgNMLCOC-8dr2MWajpfw9OSVM8JuDZWqLGmVne641FW6OGAg0_FgyZ5vt5-DmqaNfPM_pNsPc52rwbTZLn2NBj36X-K64AGfBMupSTQGD6X_eEbPac3PvHBc85Aiya-9Jy-r1Q-NaW1dqY0UoipYaDVu57F2F5VbBhvMut4QBXOqCYVXCLCON_LjMlsQG-yDlMI83-z_5wqLF2mb3IvFZaJZJLYo6ew8N-LwazwbTLRu_k8AvPg7IpEcH72aQNJJMJZJjt2Wl5ulGjxIMlfNJ4qGQh92dJ3QdvOmtanbbY8hFEFMNCiErTkYh_oMy7SomPmVjM7gQSrWR-0LLXenentrA34qDVyT-Tfwels_MhokpS8oaWpXDCVptZkXxkbW0Liqaq3N_hYn6xiXCdOloG5joI4zXdcXDPgHJY5-Qd4RXIesZQ8x_D_9FR7M9kDV5KuB1ZWbmZYrPAuNzRJPs6ufppEBWsm8Tvp0-5ic_3RifwLUhs9MuVjOUuTqqDiSv-4chBdQvfajCh-VCk0inZN9tmORPSSEZruyR87Vuz_Tg6yZ0xte1WCfOvFp3JyZ1f2ewvy7OcXz35cIj8-__U5kQm0SLsJOUyiTXCkXCJcIpZkV1q1KYRcJ4p5qTqU5FZeRJ5fMbPUgZbbBMBx6ip8CLPc2JU0rCD06ssXZLoLbB0QFnnNNRhWOEpgwIUujSl69YhtIOr8lAbx2kBACqxBeQWUR3hiChkgdxwHo45K0ZdfiGpJrdAopSrrjDnMWVQZD1RCcHjxNAzBb5dzJUt36pPvIJ_gGXkN9umK7snbN09hEKyViLFsFCnYEdD4ruFxLp0EPINlTd4aAmo1HG8wHY1GA9f1prPe4hv4-ojAAwefkGlVxEH6dgn8OKBQKeWartgyy-QSUM2EZ1nC49wBfsIXWmwYf9ILlgmFpdJYXCdXV1enGodYHY0V4856JISA2lE4n_S-NyN-_y_H2WPRhRyy5tM6jfOrGKOFD50Fl93FBF6LCZzrCTTJNyOd_-M49dyQcxvif4YFy8IX6cfIIBE44lRMIU6VGBwjB1wnvwRbx8N-cz7V4C9eHp-QRn_LGYVFvFxcLhN21xl9fVxcWb7rUBZrOJu6Q0NUGRDhF8G43MXwa5PvgsV_kf6xiyErfJld4XjaqivrqXYNOkpoXs3SouGvB1oyHG0a5OPZ2uQQsBkkTXSQBPHRSPxVCdukGWIdjNUIyvzh0R7NXYKBrkh6M4jLRlwn4zFmVo9UWIIBVMkyHU5EbpRtWZaq6hcwTOI9VmPGKW3ZhlwilIgJCnE-W1UXRlbjcgfqVoWp3gHmI5VpBKRxisAP9rBEV7bl3T3b0mepu6p1Jj-wmXcEC9YLNFhcMMsLs2Q0N0c0HbPxdvDObByj6rDI8jC7ukGa91Z09fFcXNDg42TZcZLU8-9HlopxdxBPO3i3eGZWt09VLbopqxmYrAZd0lwn2Jm3rhn4g9YJWaWgBzY3Lavm3ISPswpcXMdWuV-tP-ktSpbTAsLpQulvmumAX1tt40b1kZiHclbS61il93T6z21XN_fzu49jCihHSPYeHsn-wyN5-PBIHj08kscPj-TJwyN5-vBInn3GJHtHXFzJ4POl2RWOMQN_Gqw4DZbZO5Pq1VvazvGNg7E5x1fDoaBlrRE3XCLOwviydm4xLkr4v-gkCo6Rt_iZ8f_5j_8sSclpwSH4glwwJmLF6Vkf2hDCX_wKKfMeWgg0kG1W8rNlsSBAD8lEzbogK0hLIXKOORas-9AFy3gw9qKTTk-m5oNDOsUJs1ZqyXMI9_Y8gghElMtTxkIkbbmLk1ASk9AUj6kQvKhK4DPZ0gv4QDZIJIm3OVZJQZpmis1q5jqh_G4VdrvQ8kx-Jm9Lu7LeMowsqH_YQB4M9APj5A0KDThQH-lm1vuNDRobqGNva3xcMNlIkoZ4B1kBuzXgjtLSQN1NV9AdBJhr7BXosa2k6eCuR6v1lqTcinT7cgynjGjuDNzTPG05SQfznfn-8CP2p_QJk49LeIxdqQR-5MickCEuLM3DAwsD8H7gwZ-REaMNb4sHUwaRY0BmpGgW2tSA_wu3-z4NO8Uhr5EX-p4pD9Xm1KHMzemrlBCSR9aSPE70ex2OSsOkZ2IXugZ7gyRwXR10-Ex2Xm__XCKE0XqKr7ZQR-rq8zkuBv9g7p1y8D1rf5NfMZaqbqpXyz6nXCe6oLLdwm6Ja_1N4M97E_yIPOxVMWxOqvsErtHwfC9PkOvtWSx1in1nCYFx3G9N72U6Fbo2MQP8z_Rj8t__RdBukzs4097iF9GGvvOUPE0SXCJQlQTiA1ZcXLLwVC9RpRp0mYl6kSalbfcb5ql2rHXBdvw5l9-76zqdp1v17n6WKyXIaRgqBKZuJDcuwhjPS1ZsOSw9eQYfulvttkQcLzVTHL2sjgsE5kUVYy0e7dzM7QL7_EHrNRxT9C_jEI9cXNobMcsk20h9TuJtzGvXZH1XtqvDHUBydgVqsRXX4dRGukY1VajwHOc2K6q9PJAExtXkF3iovgtAfcwVdQKzAikjbKqiN9Wudc6r2nVv8XYQWF6OsSqaEoQ6mNd0okueeNgzkJuiKIqCHZznQR4fQuGKiVdMvFJoqF8phNGa3g99HAuG4M0JtdcMTzxpJjZ5sivxuy8ZkcdorljJTUpqs3vLIJxM4lKsLg9XFyBlKV0mLDSP0PZJq4isUGdiY3l4VuiAtEvw8Tvx8Vra7Lg0aHyFhtONgjynm1KpnDzUqr48NV8maC232rJO0UBt1ZuWrq-VLWnOBEnB5UkPTiM3IYEScfjHyhQPYGDSNZi2ESXxNpg7qZTjJvb6H8LebtYc8N67M--vVZhWm0U7awcNqCZbm-1NljZHOWRcJ545z7OCr7MkzoK8yH5nKx6EXDAcXCdlI_Oq4HDtmqB9KBMdbUMrKGFsCgYpKrKqXCKpglCN1cJF__qrfEheS2JKcyNOAV9lxUXIytXBaS2vDbU2M2hukWJX6-whaGWx8KS-Pi3VjhbnpvyPbzbjmwRCMtl4QUC-1rxF38CUkqIJUpqEE21cMFXcAcVUTKmUlza2Ca_ReN0GGQiU6AP4nei8W6MjzxLzAqkj6JRpaSiJbZ-NpkxrYK12Hjj6RvaRqztfwwpoFzm6HtlcXIlZBA27ot7bkuzM3HRgdBuAthW0NvtSGVwwW36zo9AV2YDx6YaRWwrxNhgxmBMXE4H_q07MKvNGjMd5NaxcMNoXhY3igGET2bZlGF5ogoUz1-TiannNihJcIsuEvEil4dO5wFTN98Y4xBUpqXTmgT2ZqZqMjjpmDbhaaKJOTh4gO5iWa1wwbiYNjQYriqwYDoZBTLcbpoMZaQlg3LNouBja1UQBD1HQxhm4eLpxuyFlsXrykaUhIFwwMImSEKEJf9LDc_oLWXcbnvWBCHIWjRavXr1-8xUWREfmFqqhfxlvqgvEMNM3WVHsyRUjK6CDrOM0JDyiXFxUMb_S4jW9VUzdNNZDC0S8p--GkwmT0ccWyZYbGAv5e_ymqefK-4n_pzdNRS2Brlwn66Gpv8vT6CkoV6kvk6E6YsX7ZSYrzGvknChon-ULIaETAlkFSVU7LLBVxFTdWeIjmMGWp-R1wiDHXCIchEo3NE4JRL0RKbMtI2G8XjOs0pALtge_FpanZ_18YU7fy2xE3LtS0zBJb61dCbHWPqvaxXqX9qJedBq1wgSoXCd54-S0WMCGHuU36tjGLRC41m0faNBZQ6tl3zyqPTyAOIqsBoq8rxFms-Iqy0TwWawOOCYqRRoLyDRhYuF09LBcJ7FcXIrdhAMQizR2qb13DQIZK90vnggtTcQ9rHk-MQnlpRU3UrrVd6yq5KoVUoakwth-XXd_HWjtBO12WL3bEWvOvN4SrX87tOag763QqqV_tXLkOVBHvi2kStYtuTuVRzMBaQMCQvtwt-IOxAiOXo7atQkdXDB350QZdxK6ZIkZB8_d6oeOtuFg8X7MKgXDniVNWL0rOgE1aICtQcKW-gKeKvgYDKazGQLv1dHE-FLggtR4R4zWTCqGNoRqbOOJ3w63U_sBCgxls0NN5wUQH2NdRgcuWE85j-KS4GUwAj_f4lVS8swC1jFMHUPEtzJDEq7f8vq71MEjl0Im2nWJHcQ6TFuzfI0EnvP9Tfrzeq-S5Vwix1iYxsjVbep-fG_x9uV3z38lz169fHP-69tn5y9evQQf4grgoUFk7tP3wLNAXCIpHAq9YsJFcGQHXtlcMFVj4E3ecPjMdykLvxLhhd7kq232DZv8ebjnEpf4x-zu12e1KiGWzOR7rWc-EPptvEXPQ3ZF8o0JZ0Sd8VTWLGkeq-3Tsvy7LLE-eZWz9G94YBY8wOAE_sVcJ0P4MMQPY_gwxg8T-Fww_-Leo8dffrHMwv37L79QZc45GcCzLS02cSo_X5MvvzhVMj0hp5WA30ODOHJcJ4eek14PR5fHdU9IV5W3gfa9QoQ8nJPxIH8HXDDWmT14NoJn0KNe1J0TV4Da5MrPjizezr_8ApGR-kPiTkU3MeaVHmGAvZv4PQEohDhcJ197Uz8cTeEBEdRbrKhNwPMPXCfgD2qYpt50NRs_vs2EalSmmP0kmn1t9lwwpaK1eE7osgTLxpkYaQ0IRoN_gs-gz3MyHOFH5wLNTVVOnxPxEc3dv37jXDD4o-rBv8kH2Gub_Xm3PgQ7lXceXCe7a487gpNr4KO4MbMS1hHZ19CWoRRdGJd5QkHN41RIdplkqwuUhHnfdAa9_jLj5Kmo6xNuDUMaAX_MKyrytXhHfq1s87oWLHsNIBFp6p2aJrRrQZfJbqNg8hYYTKnr-b8GXCL1mqyqMhn4GgHoWA86mruqqpumxLUrSI4dmmOLDrvq_Fwwnr2pon1v0gZXo6jewW120LRUz5tgNcYgYQpdky3jli513owP-u6rS89VT8Oe6nmdOSNVgKlzBuV4Do_JL1wiBytrtbEjzEGhWH3s2lKdPeJMXDA8daokULzCDAFFslcvdQmcP-DzUqeJTdA6HQO7T22SsouhY6DoMBkmrhqsyeBiQ_tQveRgJN7CySN9r8md6NpB7eUuU3O8fFXIkEO_G0X9xoQadkemjC1DQK_JeNI2wnDaHEFlltdS0-oDiLinHf_Ybcc_mdxyBtbCPzZCK48mow4eiWuGeoSakrSPMRy1jjHqlANemF6JHdtlQYu9VdjVqRse0SjtvcGIbeP13rz4QZ8vs0I-XfgfmtbfDxtNV_TZ4s6fXFxZmFwnYEpIIE_BU3g4foql_8apgbboUbzN7tZdS04hmBP9CPCmLMHogNtTOG4eDWNVTwer4nqXjFavgPnfQpT6GFj_GGMxiE__WbncXCflFc17kkBRqy0jxiCz0d7BYgkGs-LEZ-NXgDRAWBo2LrdL590hl9mB1AKVFfh45xMwE4gCCSmBK0niLFlEL2OM9cptlvFIBwr4q1pEWN_A3fgVXCeyoLwUKoUqAXKRv8Wk1jJTL8esQbsyyw7kS__0Y0xn9esp5bEPTKTMa6AGeoewesHTQbv1LiNdl1INEzWkbJXnE0yjecuIOvGqnmN2fGTLptp0VyhGVv23MXS1mFRhqmz8bpdakqW74VXHOBUrUs0daxf4Zip8qUSgXzCd5VWn6_8FCaP7gg';
	$theme_options['Demo3']	= 'eNrtPdmO20iS7w30P2SrMQsbUyzxEHW5rGmv-5jG9NhGu4zZxWJApMSUyC6K5JBUyWqjgP2N_YT9jf2U_ZKNyItJimJV-RoXsG27S2JGRkZGRMaVmSw6d2eT-btyPpsPyqs4XWVJVgyelPPJfPDtek2nto3fnBE0s1WWhrQ4NGDsEP9wmJkBY20K1gLk_-G38XyQ0EO2q_ALIN7HIeMIpvPBepckAT4IWMK2LK3KwRM6d-bv4rktukaMhgyw3kAHR2EKqkPOJDoY_oqjg1E3SbakSbCkq6tNke3SELHx-frzQbylG97Jng8klfxRHBoPYcSC5YxWxjOgM8_KuIqz1HjqwE9aVXQVId1GA_Iu_t0cCQbvZFwizgkGjNOUFQ-KaEC-KWgYA46AAwVZyrQaMX9se0rCLbhqn9XqNlkLDQFNSjIUc7zdmMRO6-cw5WC1K6tsawJ48wEMHOTYCnMFEpZzBxtcXBiYAVdBGdYZTpTi1N9xVq3pNk4Oiht_2W2XEXlN01JhREHscqsGc6HTJY2yLT0jPwHWa_hZQgerBMrWcjrXtIipYOkExbHZJbRQa6libyurKqDPOivMGcDMkT5L8R7odsa8F-p6nDIrYvEmqmSbO1YYE1ZVrLDKnK7ilDMNOthtubnQp9gsH7m-T9S_IZnYf3g8kFxcokliIeli6fFBhMKMBGVSvTZZtkkYF74LpC8T4FFcXEbBcldVWduK4H-KvTCHK0u3A6ZaiFxcvLrZMljWQjNuwEXZNesyWTDvyAnQXFxcMEO01GdHQgeW_6XIUkpeCpXtFjnQ9gwEmpyRP7PkmlXx6pMK3fNPC33k30_oTe6dlCNnmPtgGeb1MMz7dAzzHizD7B6G2Z-OYaOHyjC3h2HeXCdkmP9QGeZMexzX9NMxbPxgGdZj9F3n0zDMFRH1A-SW37Mex59mPfLwiZUYR1-zlpbVQSggLnfLL5qrMPQuz1mxoiU7pYyjHmUc9bLX_VwwZYT8scLs4DTb7hqkf-7F-9nC9NP8c3gyvWHV__vW25UN5i1rDEEVV_iUAsgD8qy9U1svaWGZCT-MGLI13SWVmgaCBMtNcFwiG_MVRH8dYoo1marKy_lwuAXhbbPzvGAHmFwnW0VpVh7K81W2He5zSy7tYRUB18vhegf5eJwNOSb4Cpl9BWJFupeb89_yzd3KG8CeNLPq7-9f5-BKJHPJtkJN2JJiDePGYAxKrGbeVFSesO6llrABxdkaNFCGoefJrGVcImEjmoYJK4J4JYj3YKiLmKwSWpZPB3lRWZJpFkJYVTRYXFwM4wUfz-vAEaySTBh4b9qLScBpZHqKAomiulVcXBPaUaWndcgdtaA62FDXBV01qrRhXDC226ZBXSuEKU6DkeauqTAFo1d5Fqeqpui4EufsFKBVk2nA48yrLG-vjA7hGlCtWeHaAutNH9ln_M9jxTDZpak3MOA-4qUqwa8GUAuz62jMBP6CW4Cf567PR8A6jNkZbcOxPx9roIStKw4pZgS9L3aJ0hCA4euVripQiyReXFyA1U1N_amrxYtfslVFYb2RObkYXCLcgqXXYFwwMhL9g7gjso7XVXRGKMymoElML4aI8BakP2xpnNQYLyiJCrZ-OsDHVTaP03X2HXtLt3nC0MAMFu1cJxdDuhAjDXfJoiWDAh2Mnr3j--8_-0uaXFyRy4z88BYCqqqD4oolENp4I388mc7sweKPtkMeOSPvMYFHBJ7NNKn_wXFnK3AlFpa4yr93EN-j7aMOmBOKjujQ7fU7gZkJ1e8IZvadHEEIDZZn-oNdjkXdcogF23I4Hrq26w1td8gHtmDkbmdcMGM7nj-b3tcj4PJcXMG4rCDix4f6B2QSX5XO5MwdnXmw5M9t57FwFiODgWV1SFiHLzaZ3GMcHAPsgeZsk544b_oecR6oysy9JWdrSOAuedlDTDCmn553aFHCVQGM-TK1DsW2onlcXIGL-Z19JiaOp2M28W6NxjUTr2O277BcMH5jaSuaoKM30aFRXXjoXDCVaoMCM-S0zIoQdxKzittzuRc2UTC7bU_oNm5i6ghzxs0w59wXkU5DaVwi3Mqt8UhOp5maNQ2vgwoBV7SixUqZw-e0YpusOJBnxSqCKZdzctSjohvVY4T7cZsWMEbEGhg4V3H3Ha9jFioyX8HTktTPCfg2VsixpkZ3uquirFDDAQOf8Qdt8jy1Pd0UomPsSInm02x3GzBtlvstlk8eK1mBX8JllASq95eye3yr13THZx54zRlOxxNe0_Okuqe60NbNkFYCMdXMM3o3cxjTo_Lt5E2mzg40slrZJANEGOdHkS_p7elN1mMGYf6vD19SfaXP7E3ub_Zqnp80exPBJL6DT2EVvOODNUI3tddfRWAarF2R8O_ORw4jkQoIpmHC5-X1RgoXz5l8thFl0YDrzJa-DRrsl2VspVPbbHkSBjSpBE25OgTqEIyw6Ji7NexOIMCa5gdNS6N7b4Y76wJumyO9hJ0z8dc-n40fa3US4tfEtLWgVteGAtQWxxQSfypL8C1GGrOteYWTZWCwoyBO812lGHAJa538DdxcIrmMWEp-wPj__FxcuTPRA5eTKgnWpm6meSzxLjc0ST7MuH6cTAXLJvFb4dXuY3g9_0z8Ban5j3UFWcxS5yrIF-EhVxaiS-jBVcZEMkRZSR8Y_PzZL7-QRurr2lPf923HcaezwQIyX9dTia9jP8bUV0cuMlxcYUm2V2pHIXZo222ntvPivImmQIVBThtcMJPppn4dwyw3ZqULM_xBc3EBw3eBKaCxko8CxBpECbK5UsUreQxKjdkFXCJPQCkQtwsEuMlatNdAeYRnnpAFYo_Q9ntqOV9_xesZjVKgMHqiEpjDrHkd8KjkwXm8eBaG4FvLuSxyOFOPfA_xfpWRV2A-9vRA3rx-BoNgNYOPZaJIYZkDs_qGx7n0EvAcVh15ownoUbVH8PUxgQcWPiHTusyC9O0S-HFEoay9rOmKLbPsaoD4ZTOpsiyp4twCfsIXWmxY9XQQLBOaXg0kEcqN7Pf7c4WDO4-WQ3FmAxJCxGtJnE8HP-oRf_zX0-wx6EIOGfPpnMblPkaP_r6zqER3PoFXfAKXagJt8vVIl387TX2lybkL8b_AkmXhz-mHyCDhOOKUTyFOpRgsLQcrv66spAqH7fnUg__84vSEFPo7zigs4uVymbD7zujb08ryfY-yGMOZ1B0botqAcLcFxkWvqjvERdK0WM4QmJX-YxdD2vZcItubhl3aT1nX7ylxuQ1bi7a_GQjJbLhlkk9nU5NjwHYMM1ExDIQvPv8r09hJOwI6GqsVM3mjkz3adXxbVQzdGYRN_tl4rJM5GTeXLFPePnKibMuyVFangGEC76kqME5pyzYUobjLLvgBa5n9-0bjcgfqVoeR7hHmE7VjBKRxisAPtxT0TzhcMOfqCN5k3wksmNUrsFwwFhjmsmhwgq4oBTPmbuCOjNk4JAtjhEWWh9n-Fml-sqKohyG7_aFlvenHO3xxV1lK1p0WT8MUoYC6wfsFNDO6fayazm1ph63TDnRKH2H3XFyxE0s7dueEjILNA5ubKoW058a9nFGGOrXKvXoFCn9RspwWEFAXjWIphvzKbmtHqo6tPJTzjW7PKrU_SRUK2dalbs6Xd6dGVzhOkOw-PJK9h0fy6OGR7D88kscPj-TJwyN5-vBInn3BJLtcJ1xcif0F08wdYwb-NFhVtPNE3TgY6xN1NeQyeyuhRU0R9wMuwvi6cYIwLkr4P-_EC4uRu_iFVf_7n_9VkrKiRQUhFoQpESvOL4bQhhDe4ldIjQ_QQqCBbLOyulgWCwL0kGxNgK6CrCD9hPg4rg5_XCLQ0ePlOhh70UunK1Jw-5hOftark1ryAwR1hyqCOAOHJiljIZK23MVJKIhJaIrHRQheKSXwmWzpFXwgGySSxNscq6EgMz3FdtVyndBqsHjfgspz8Zm8KYko4PCiZ8cwonb-fgO5MNBPrFwir1FowIHmSLez3mvtk5hAPVtM4yPIVio0wtvCEthpXDD3lJBseYlcXEKbBBj49F3zGuxeuzl8B3Ps2vfOPzD4ZeuKqDMZH7zEnVoqXCfOl3FGo_aryR6ZAYD3Ahf--JrXJrzJQ5xcMA_3IUmR5HKRt-A_49bY_TjZl8q5vht6rq7UNObUo3Ht6cvsDPI41pHHTdRbEk5KQ2dKfMe2AXuLJFD5jzp8IbuUd36vwNpfT9dUu6_mfE6LwTuae68cPNfYb6z2jKWym-yl9h1H2CHV1WmhbF3iaFs3uwP4y94wPiEPc1WM2pPqP66qNTw_iAPXaPpU3ZGfdRYQGFL9ve1idKdClQlmMPxz9Zj8z38TPHBB7uHxBgtoizP0b-fkWZIQjqkk4MNZcc3Cc7VCpWbQZcYrN4qSDqXAVSj3j1XxdPwl3_Trr7D0ngRVe-1ZLnUgp2EoEegKjthECGM8W1iz5bgI5Gp8ZURz5bV4RC0Ukx9TrDfvA_2ah7ESj_Jt-iy-eRqg89KKLr-XcYjHE81NkWWSbYQ6XCfxNm6evPEc0S7PQVwwydke1GLLL4_JTW2FaipR4ZnHbVbU-2ogCYx9yV_hofzOAdWRUNSJ7K2SETbVEZZsVzrn1u2qN3-3BqwuSxsVRQlCHc1rOlHFRzwZGYgNShRFwY6OviCPj6FwxcQrxt_PM1Lv58GoSu1NPok5Q_Cegdz3hVwnrrASmzzZlfjdE4zIY7RWrKx0cmiye8sg5Evikq8uF1cXIGUpXSYs1I_Q9AmjiKyQB0hjVmodqNQLgr7nH2-EyY5LjcaTaCq6kZCXdFNKlRNcJ0Dll2f6ywSN5VYZ1inap618bdHNjbQl7ZkgKbg86dHJ3TYkUIK6rzfoumBg0g2YrhEF8SaYM6mV4zb2eu_D3n7WHPHevTfvb2SU1phFN2vtFlSbre32NkvboxyzE89n51lRrbMkzoK8yH5jqyoIAThOylZ2VMPh2tUx-0gkJMqG1lDc2BQM0khkVU1SDSEb64WL7vVX8ZC8EsSU-v6YBN5nxVXIytXR2Sm3C7UyM2hukWJH6ewxaG2x8FS7OrnUjRbnJv2PpzfG2wRCwte6Xp-vFW_RNzCppGiCpCbhRFtANXdAMSVTauWlrQ27GzRed0EGAiXqtHovOvfO6MjzRL9-6QQ6aVpaSmLaZ60p0wZYp50Hjr4WfcTqztewArpFjq5HNNdi5kHDrmj2NiQ707cCGN0GoG0Fbcy-lAbAlN_sJHRNNmB8tmHkjkK8C0YM5vg1PuD_qhezTLwR42lejWqA7kVhojhi2ES0bRmGF4pg7swVubhaXrGihMgyIT-nwvCpVGAq53trHOLwjFQ488CczFRORkUdsxZcXCM0kacYj5AdTcvRXDC3k4ZGgxVFVozsURDT7YapYEZYAhj3XCIaLUZmxY_DQxS0sWwHTxpuN6QsVk_veUddHe0WR7qdIRBcMJjOc4h2CU2qpwM8174QtbHRxRCIIBeRv3j58tXrb7Bo6es7m5r-Zbypr9vCTF9nRXEge0ZWQAdZx2lIqohWvNL4jRKv7i1j6raxHhkg_K13t5wRmPjzD-TEcgNjIX9P38p0nan9T7-VyUsJdD1Zj_RFTHFwOwXlKtXFK1RHrEq_yEQVeI2c40Xni3zBJXRGIKsgqWyHBbaKmKwNC3wEE9jynLxKGORYpAKh0g2NUwJRb0TKbMtIGK_XDIs05IodwK-F5fnFMF_og-pcIhvhl5TkNHTO22iXQmy0z-p2vt6FvWjWnPxOmFww9SSX7NSZ-cSkR_qNJrZxBwSuddMHanTG0HLZtyB4jacJcRJZAxR537xPZrBin2U8-CxWRxzjhVwihQVkmjC-cHp6mJNYLnnF_wjEII1dK-_dgEDGCveLpzNLHXGPGp6PT0J6acmNlG7VnaQ6ueqEFCEpN7bfNt1fD1ozQbsbVvduxOrzp3dE690NrT50e1wntHLp71eWOJNpiXdr1Mm6IXer9mg6IG1BQGgf7laVBTGCpZajcm1cXAfA3VlRVlkJXbJEj4NnYNVDS9lwsHh_zmoFw54lTVizKzoBOWiArUHClsbLbmtfCBh0Zz0E3kOjifalwAWh8RYfrZ1UjEwI2djFE68bblwntwMkGMpmh5peFUB8jHUZFbhgPeUyikuCN6cI_HyD9y7JcwNYxTBNDFG1FRkSd_2G19-lFh5_5DJRrovv8jVhuprFSxfwzO3fhT9v9ipZznOMhW6MHNUm75IPFm9efP_Dr-T5yxevL3998_zy55cvwIc4HHikEem75wPwLJBIcodC94y7iArZgddcJ0DVGHiT1xV8rnYpC7_h4YXaiGtsyI3a_Hm4XCcEl_hH77M3Z7UqIZbMxEuiZx4Q-l28Rc9DdkXySIczvM54LmqWNI_lFmdZ_kmUWJ--zFn6Rzy8Ch7APoN_8dkIPozwwxg-jPHDBD7Av3jw-MnXXy2z8PDu669kmXNObHi2pcUmTsXnG_L1V-dSpmfkvBbwO2jgh9_E0HMyGODo4ujsGemr8rbQvpOIkIdzMrbzt1wwYJyeg2c-PIMezaLunDgc1CRXfLZE8Xb-9VeIjDQfEmfKu_Ex92oEG3u38bsckAtxTr51p17oT-EB4dQbrGhMwPWOXCfg2Q1MU3e6mo2f3GVCDSpTzH4Sxb4ue4BSUVo8XCd0WYJlqxgfaQ0IfPsP8Bn0eU5GPn60rtDc1OX0OeEf0dz92yMLwB_XD_5dPMBe2-z3-_Uh2Km89zjZfXvcE5zcXDAf-e2VFbeOyL6WtoyE6MK4zBMKah6nXFyyyyRbXaEk9NuaM-j12YyTK6Ouj7gzDGkE_NGvc8jX_IXzjbLNy2VcXO1URZRXu0wgHmmqnZo2tGNAl8luI2GyDhhMqRv5v0ZEmjVZWWXS8A0C0LEedTyoCojspihBYE2KZYbm2KLCriY_gGev62jfnXTBNShqdnDaHRQt9fM2WIMxSJhE12bLuKNLkzfjo76H-n5w3VOzp37eZI4vCzBNzqAcL-Ex-SvPwcpGbewEc1AoRh-zttRkDz8SXDBPrToJ5C_8QkCe7DVLXRznT_i8VGliG7RJh232aUxSdNF02JIOnWHiqsGaDC42tA_1SwF8_s7KKlJ3jJyJqh003qEx1Qe9V4UIOeDhgZX69w80sFtcImXsGAJ6TcaTrhFG0_YIMrO8EZrWHIDHPd34x043_snkjjMw8u5TI3TyaOL38Ihf-VMjNJSke4yR3zmG3ysHvLy84ju2y4IWB6Owq1I3PKFRmnuDEdvG64N-SYI6A2aEfCOg4dw8vmfxX5BBILQg8J_YDEaBzHFTXvudkUb2W43L2EQQjeji-XU9sRAxrcAMkkBagwfrkNwUdwpaZwy6gk3-qrg7dy0rCrEf70eAlWUJNgq8pMRx-2gY2roqtuU3s0RwuwdZfQdB7ROQ1BMM3SCc_RfpoZ-We5oPBIG8tFtGjEFcIqScicESjH35Ic7W799ogbA0bN1LF76-Q4zGFlirNZBJhIfXNQGzkGwJXFxJEmvJXCJ6HWNoWG5B-pGSL_6eFJ4FtHC3fr-IqD8vuQaiSoBcXMSvEGm0zOSbXCcb0I5IygPxRj31GLNf9e5HcUoE8y79hiVbbSjW7046ajfeE6TKWLJhXCKHFK3iOINu1O_vkIdYjVk1j2WqFkyzT-z91Lv3EolvFJJbRNWrUla4ytavXFxpZGuqG95ejFO-tCVXsAiCr4PCF6kE6j3PWV53uvk_p1_Wlg';
									
	if ( !function_exists( 'tm_cs_decode_string' ) ) {
		function tm_cs_decode_string( $string ) {
			
			// decode the encrypted theme opitons
			$options = unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	
			
			// changing image path with client website url so image will be fetched from client server directly
				$demo_domains = array(
									'https://minemo.preyantechnosys.com/',
								);
				
				// getting current site URL
				$current_url = get_site_url() . '/';
				
			foreach( $options as $key=>$val ){
					if( !empty($val) && is_string($val) ){
						if( substr($val,0,7) == 'http://' ){
							$val = str_replace( $demo_domains, $current_url, $val );
							$options[$key] = $val;
						}
					}
				}
		
			return $options;
		}
	}
					
		$new_options = tm_cs_decode_string( $theme_options[$selected_import['import_file_name']] );
		
		update_option('minemo_theme_options', $new_options);
	

	
	
  }
}
add_action( 'ocdi/after_import', 'minemo_demo_after_import' );

?>
