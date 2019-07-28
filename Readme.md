<h2>
	Overview
</h2>

<p>
	The goal is to create a search engine from scratch.
</p>

<h2>
	Database Design and Content
</h2>

<h3>
	Table Page:
</h3>>
<ul>
	<li>pageId – primary key</li>
	<li>url – URL of the page</li>
	<li>title – title of the page (from HTML meta data)</li>
	<li>description – description of the page (from HTML meta data)</li>
	<li>lastModified – date when page was last modified by page host (from HTML meta data), to prevent reindexing if no change</li>
	<li>lastIndexed – date when the page was last indexed in your db, to prevent reindexing too frequently</li>
	<li>timeToIndex – time in seconds that it took to index the page, used compare different approaches and to project how many pages can be index within a timeframe</li>
</ul>
