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
</h3>
<ul>
	<li>pageId – primary key</li>
	<li>url – URL of the page</li>
	<li>title – title of the page (from HTML meta data)</li>
	<li>description – description of the page (from HTML meta data)</li>
	<li>lastModified – date when page was last modified by page host (from HTML meta data), to prevent reindexing if no change</li>
	<li>lastIndexed – date when the page was last indexed in your db, to prevent reindexing too frequently</li>
	<li>timeToIndex – time in seconds that it took to index the page, used compare different approaches and to project how many pages can be index within a timeframe</li>
</ul>

<h3>
	Table word:
</h3>
<ul>
	<li>wordId – primary key</li>
	<li>wordName – the word indexed</li>
</ul>

<h3>
	Table Page-Word: 
</h3>

<ul>
	<li>pageWordId – primary key</li>
	<li>pageId – foreign key to page table</li>
	<li>wordId – foreign key to word table</li>
	<li>freq – the number of times that a given word appears in a given page (used for sorting results)</li>
</ul>

<h3>
	Table Search: 
</h3>

<ul>
	<li>searchId – primary key</li>
	<li>terms – word or words entered into search box</li>
	<li>count – how many results were found</li>
	<li>searchDate – when the search was requested</li>
	<li>timeToSearch – time in seconds to perform the search</li>
</ul>

<h2>
	Crawler/Indexing Engine
</h2>
<p>
	This is the back-end module which takes a page next in line to be indexed, reads the content of the page, parses it into
words, and updates the database as specified in the previous section. (Note that it will need to update tables page, word,
and page_word, but not search.)
It is suggested that for each page slated to be indexed, one also collect additional URLs to be indexed (by looking through
it for “href” attributes). This somewhat akin to a “breadth first search”.
</p>

<h2>Admin: Indexing Launcher</h2>
<p>
	This is an Admin screen in which the user can type/paste a URL to be indexed, passing it to the Indexing Engine
mentioned above. Alternatively, one can add an option to the previously created screens that for any search result in
Phases 1, one clicks a button to index selected items.
Note: for this and the other “Admin” screens, no special authentication (login) is required. It can be assumed that all users
have rights to use these functions.
</p>

<h2>Search Entry</h2>

<p>
	This is the screen in which a user types a search term(s) and clicks Search, then waits for results. Since there is
ambiguity as how a user intends to search, ideally these should be handled by explicit options on the screen (using radio
buttons or checkboxes), such as
	<ul>
		<li>Case-Insensitive</li>
		<li>Allow Partial match</li>
	</ul>

	This fundamental query will drive the search:

	SELECT *
FROM page, word, page_word
WHERE page.pageId = page_word.pageId
AND word.wordId = page_word.wordId
AND word.wordName = ‘​ wordEntered ​ ‘
ORDER BY freq desc <br>
where ​ wordEntered​ is the search word entered in the search box.
For case-insensitive, change the last line in where clause to (something like)
AND Upper(word.wordName) = Upper(wordEntered)For allow partial match, change the last line in where clause to
AND word.wordName LIKE ‘%wordEntered%’
If both options are checked, you will need to combine the two modifications.
It may be assumed that the user will enter only one search word at a time. Handling of multiple terms is left as an
“advanced feature” for extra credit .

</p>