<?php 
// open and load site variables
require('Site.conf');

// open and print header template
require('header.php');

// connect to mySQL server and select the Fossil Calibration database
$connection=mysql_connect($SITEINFO['servername'],$SITEINFO['UserName'], $SITEINFO['password']) or die ('Unable to connect!');
mysql_select_db('FossilCalibration') or die ('Unable to select database!');

?>

<div id="simple-search-header" 
     style="">
	<select style="float: right; margin-top: 3px;">
		<option>Group by relevance</option>
		<option>Group by relationship</option>
		<option selected="selected">Sort by date added</option>
		<option>Sort by calibrated age</option>
	</select>

<!--
	<h3 style="display: inline-block; font-size: 1em; font-family: Helvetica,Arial,sans-serif;">Search</h3>
-->
	<input type="text" style="width: 420px;" value="Search by author, clade, publication, species,etc." />
	<input type="submit" style="" value="Go" />
</div>

<div class="left-column" style="">

    <form id="advanced-search" Xstyle="border: 1px dashed red;">
	<!-- faceted search tools -->
	<div id="faceted-search">

<!--
		<h3 style="margin-top: 2px;">Recommended views</h3>
		<div style="text-align: center;">
			<select>
				<option>Recently added calibrations</option>
				<option>Calibrations in clade Mammalia</option>
				<option>Calibrations in clade Aves</option>
				<option>Advanced (using filters below)</option>
			</select>
		</div>
-->
		<h3>Advanced search filters</h3>
		<dl class="filter-list">
			<dt class="optional-filter active-filter">By <a class="term" href="#">extant (living) species</a></dt>
			<dd class="active-filter">
<table width="100%" border="0" align="left">
  <tr>
    <td style="width: 60px; text-align: right;">Species&nbsp;A&nbsp;</td>
    <td><input type="text" name="TaxonA" id="TaxonA" style="width: 92%;"></td>
  </tr>
  <tr>
    <td style="text-align: right;">Species&nbsp;B&nbsp;</td>
    <td><input type="text" name="TaxonB" id="TaxonB" style="width: 92%;"> </td>
  </tr>
  <tr>
    <td style="text-align: right; position: relative; top: -4px; font-size: 0.8em;">(optional)</td>
    <td>&nbsp;</td>
  </tr>
</table>
			</dd>

			<dt class="optional-filter">By any <a class="term" href="#">clade</a></dt>
			<dd>
<table width="100%" border="0" align="left">
  <tr>
    <td style="width: 60px; text-align: right;">Clade&nbsp;</td>
    <td><input type="text" name="Clade" id="Clade" style="width: 92%;"></td>
<!--
    <td>
	<input type="submit" name="Submit1" id="Submit1" value="Show all within clade"
	       Xonclick="return testForTipTaxon( TODO );">
    </td>
-->
  </tr>
</table>
			</dd>

			<dt class="optional-filter active-filter">By age (in <a class="term" href="#">Ma</a>)</dt>
			<dd class="active-filter">
<table width="100%" border="0" align="left">
  <tr>
    <td style="width: 145px; text-align: right;">Minimum (youngest)&nbsp;</td>
    <td><input type="text" name="TaxonA" id="TaxonA" style="width: 80%;"></td>
  </tr>
  <tr>
    <td style="text-align: right;">Maximum (oldest)&nbsp;</td>
    <td><input type="text" name="TaxonB" id="TaxonB" style="width: 80%;"> </td>
  </tr>
</table>
			</dd>

			<dt class="optional-filter disabled-filter">By <a class="term" href="#">geological time</a>
			</dt>
			<dd class="disabled-explanation">
				This is incompatible with the <strong>age</strong> filter above. 
				Remove that filter to use this one.
			</dd>
			<dd style="margin-left:8px;">
<div style="text-align: center; margin: 4px 0 2px; padding-right: 12px;">
<select name="Age" id="Age">
	<option value="">Choose any period</option>
	<option value="Modern">Modern, Quaternary, GSA 1999</option>
	<option value="Calabrian">Calabrian, Quaternary, GSA 1999</option>
	<option value="Zanclean">Zanclean, Neogene, GSA 1999</option>
	<option value="Tortonian">Tortonian, Neogene, GSA 1999</option>
	<option value="Serravallian">Serravallian, Neogene, GSA 1999</option>
	<option value="Bartonian">Bartonian, Paleogene, GSA 1999</option>
	<option value="Bartonian">Bartonian, Paleogene, GSA 1999</option>
	<option value="Danian">Danian, Paleogene, GSA 1999</option>		     
</select>
</div>
			</dd>
			<dt style="height: 0px;">&nbsp;</dt>
<!--
			<dd><input type="submit" value="Update"/></dd>
-->
		</dl>
		<div style="text-align: center; margin: 4px;"><input type="submit" value="Update Results"/></div>
	</div>
    </form><!-- end of form#advanced-search -->
</div>

<div class="right-column" style="margin-top: -37px;">
<?php require('site-announcement.php'); ?>
<!-- news
	<div id="site-news">
		<h3 class="contentheading" style="margin-top: 0;">Site News</h3>
		<div class="news-item">
			<div class="dateline">
				Jan 1, 2013
			</div>
			<div class="headline">
				<a href="#">This is a Headline</a>
			</div>
			<div class="excerpt">
				This is an excerpt of the news item, just
				enough to encourage clicking for the full
				story... <a href="#">more</a>
			</div>
		</div>
		<div class="news-item">
			<div class="dateline">
				Dec 29, 2012
			</div>
			<div class="headline">
				<a href="#">And This is a Second, Longer Headline</a>
			</div>
			<div class="excerpt">
				This is an excerpt of the news item, just
				enough to encourage clicking for the full
				story... <a href="#">more</a>
			</div>
		</div>
		<div class="news-item">
			<div class="dateline">
				Nov 28, 2012
			</div>
			<div class="headline">
				<a href="#">Yet Another Headline</a>
			</div>
			<div class="excerpt">
				This is an excerpt of the news item, just
				enough to encourage clicking for the full
				story... <a href="#">more</a>
			</div>
		</div>
	</div>
-->

	<div id="site-news">
		<h3 class="contentheading" style="margin-top: 8px; line-height: 1.25em;">Raising the Standard in Fossil Calibration
		</h3>
		<p>
			The Fossil Calibration Database is a curated
			collection of well-justified calibrations, including many published in the
			journal <a href="#">Palaeontologia Electronica</a>. We also promote best practices for
			<a href="#">justifying fossil calibrations</a> and <a href="#">citing calibrations</a> 
			properly.
		</p>
	</div>

</div>

<div class="center-column" style="">

<!--
<h2 class="results-heading" style="clear: both; border-top: none;">Recently added calibrations</h2>
-->

<!--
<div style="text-align: center;">
	<select style="margin: 3px auto;">
		<option>Group by relevance</option>
		<option>Group by phylogenetic relationship</option>
		<option selected="selected">Sort by date added (newest first)</option>
		<option>Sort by date added (oldest first)</option>
	</select>
</div>
-->

<div class="search-result">
	<table class="qualifiers" border="0">
		<tr>
			<td width="24">
			&nbsp;
			</td>
			<td width="*">
			&nbsp;
			</td>
			<td width="100">
			&nbsp;
			</td>
			<td width="120">
			Added Jan 3, 2013
			</td>
		</tr>
	</table>
	<a class="calibration-link">
		<span class="name">Archosauria</span>
		<span class="citation">&ndash; from Imis, R. 2012.</span>
	</a>
	<br/>
	<div class="optional-thumbnail"><img src="images/archosauria.jpeg" /></div>
	<div class="details">
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result...
		&nbsp;
		<a class="more" href="#">more</a>
	</div>
</div>

<div class="search-result">
	<table class="qualifiers" border="0">
		<tr>
			<td width="24">
			&nbsp;
			</td>
			<td width="*">
			&nbsp;
			</td>
			<td width="100">
			&nbsp;
			</td>
			<td width="120">
			Added Dec 28, 2012
			</td>
		</tr>
	</table>
	<a class="calibration-link">
		<span class="name">Salviniales</span>
		<span class="citation">&ndash; from Hermsen, E. &amp; Gandolfo, A. 2011.</span>
	</a>
	<br/>
	<!--<div class="optional-thumbnail">{image}</div>-->
	<div class="details">
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result...
		&nbsp;
		<a class="more" href="#">more</a>
	</div>
</div>

<div class="search-result">
	<table class="qualifiers" border="0">
		<tr>
			<td width="24">
			&nbsp;
			</td>
			<td width="*">
			&nbsp;
			</td>
			<td width="100">
			&nbsp;
			</td>
			<td width="120">
			Added Dec 23, 2012
			</td>
		</tr>
	</table>
	<a class="calibration-link">
		<span class="name">Carnivora</span>
		<span class="citation">&ndash; from Polly, P.D. 2010.</span>
	</a>
	<br/>
	<!--<div class="optional-thumbnail">{image}</div>-->
	<div class="details">
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result.
		Here are some fascinating details about the calibration in this result...
		&nbsp;
		<a class="more" href="#">more</a>
	</div>
</div>

<div class="search-result">
	<table class="qualifiers" border="0">
		<tr>
			<td width="24">
			\/
			</td>
			<td width="*">
			99% match
			</td>
			<td width="100">
			9&ndash;12 Ma
			</td>
			<td width="120">
			Added Dec 9, 2012
			</td>
		</tr>
	</table>
	<a class="calibration-link">
		<span class="name">Insecta</span>
		<span class="citation">&ndash; Ware, J. 2011.</span>
	</a>
	<br/>
	<div class="optional-thumbnail"><img src="images/insecta.jpeg" /></div>
	<div class="details">
		Here are some details about the calibration in this result.
		Here are some details about the calibration in this result.
		Here are some details about the calibration in this result.
		Here are some details about the calibration in this result.
		Here are some details about the calibration in this result...
		&nbsp;
		<a class="more" href="#">more</a>
	</div>
</div>
<div style="text-align: right; border-top: 1px solid #ddd; font-size: 0.9em; padding-top: 2px;">
	<a href="#">Show more results like this</a>
</div>

</div><!-- END OF center-column -->
<!--<div style="background-color: #fcc; color: #fff; clear: both;">test</div>-->
<?php 
//open and print page footer template
require('footer.php');
?>