<?php
class TvlgiaoWpdanceClassNameVar
{
    private $tvlg_data,$tvlg_data_pages,$tvlg_post,$tvlg_product,$tvlg_yith_woocompare,$tvlg_woocommerce,$tvlg_woocommerce_loop,$tvlg_wp_query,$tvlg_author,$tvlg_projects_loop;
     public function __construct(){
		 $this->TVLGiao_wpdance_SetVar();
	 }
    public  function TVLGiao_wpdance_GetVarBlobal($name)
	{
		if($name =="wd_data")
		 return $this->tvlg_data;
	   elseif($name =="page_datas")
		 return $this->tvlg_data_pages;
		elseif($name =="post")
		 return $this->tvlg_post;
		elseif($name =="product")
		 return $this->tvlg_product;
		elseif($name =="yith_woocompare")
		 return $this->tvlg_yith_woocompare;
		elseif($name =="woocommerce")
		 return $this->tvlg_woocommerce;
		elseif($name =="woocommerce_loop")
		 return $this->tvlg_woocommerce_loop;
		elseif($name =="wp_query")
		 return $this->tvlg_wp_query;
		elseif($name =="author")
		 return $this->tvlg_author;
		elseif($name =="projects_loop")
		 return $this->tvlg_projects_loop;
	}
	public static function TVLGiao_wpdance_GetVar($name)
	{
		 $a = new TvlgiaoWpdanceClassNameVar();
        return $a->TVLGiao_wpdance_GetVarBlobal($name);
	}
	public static function TVLGiao_wpdance_SetVarSlidebar($name)
	{
        global $wdjewelry_default_sidebars;
		$wdjewelry_default_sidebars = $name;
	}
	public static function TVLGiao_wpdance_SetXml_headers($name)
	{
        global $wdjewelry_xml_headers;
		$wdjewelry_xml_headers = $name;
	}
	public function TVLGiao_wpdance_SetVar()
	{
		global $wdjewelry_wd_data,$wdjewelry_page_datas,$post,$product,$yith_woocompare,$woocommerce,$woocommerce_loop,$wp_query,$author,$projects_loop;
		$this->tvlg_data= $wdjewelry_wd_data;
		$this->tvlg_data_pages = $wdjewelry_page_datas;
		$this->tvlg_post = $post;
		$this->tvlg_product = $product;
		$this->tvlg_yith_woocompare = $yith_woocompare;
		$this->tvlg_woocommerce   = $woocommerce;
		$this->tvlg_woocommerce_loop  = $woocommerce_loop;
		$this->tvlg_wp_query   = $wp_query;
		$this->tvlg_author     = $author;
		$this->tvlg_projects_loop  = $projects_loop;
	}
}
 
?>