<?php
class SWS_ProductCategoryTest extends SWS_Test {
	
	public function setUp() {
		parent::setUp();
		
		$category = $this->objFromFixture('ProductCategory', 'general');
		$this->assertTrue(is_numeric($category->ID));
	}

	public function testProductCategoryProducts() {
		$category = $this->objFromFixture('ProductCategory', 'general');
		$productA = $this->objFromFixture('Product', 'productA');
		$productB = $this->objFromFixture('Product', 'productB');
		
		$this->loginAs('admin');
		$category->doPublish();
		$productA->doPublish();
		$productB->doPublish();
		$this->logOut();

		$this->assertEquals(2, $category->Products()->count());

		$list = Product::get()
			->innerJoin('ProductCategory_Products', "\"ProductCategory_Products\".\"ProductID\" = \"Product\".\"ID\"")
			->where("\"ProductCategory_Products\".\"ProductCategoryID\" = '".$category->ID."' OR \"ParentID\" = '".$category->ID."'");

		$this->assertEquals(2, $list->count());
	}
	
}