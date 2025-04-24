<?php 
    $template_search_name = 'false';
    
    if(isset($_GET['searchName'])) {
        $template_search_name = $_GET['searchName'];
    }
?>

<label for="searchBlogger" class="mainPage__searchLabel">
    <input type="text" name="searchBlogger" id="searchBlogger" class="mainPage__searchInput"
        placeholder="Искать..." value="<?php echo $template_search_name !== 'false' ? $template_search_name : '' ?>">
    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"
        class="mainPage__searchLabelImg">
        <path
            d="M7.2593 12.9446C10.5321 12.9446 13.1852 10.2915 13.1852 7.0187C13.1852 3.7459 10.5321 1.09277 7.2593 1.09277C3.9865 1.09277 1.33337 3.7459 1.33337 7.0187C1.33337 10.2915 3.9865 12.9446 7.2593 12.9446Z"
            stroke="#AEB9E1" stroke-linecap="round" stroke-linejoin="round" />
        <path d="M14.6666 14.4263L11.4444 11.2041" stroke="#AEB9E1" stroke-linecap="round"
            stroke-linejoin="round" />
    </svg>
    <a href="http://localhost:3001/BeFluence/wp/search" class="mainPage__searchButton jsTranslateHidden">Искать</a>
</label>