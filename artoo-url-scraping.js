var scraper = {
  iterator: '.media__image',
  data: {
    url: {sel: 'a', attr: 'href'}
  }
};

function nextUrl($page) {
  return $page.find('.pagination__next').attr('href');
}

artoo.log.debug('Starting the scraper...');
var frontpage = artoo.scrape(scraper);

artoo.ajaxSpider(
  function(i, $data) {
    return nextUrl(!i ? artoo.$(document) : $data);
  },
  {
    limit: 66,
    scrape: scraper,
    concat: true,
    done: function(data) {
      artoo.log.debug('Finished retrieving data. Downloading...');
      artoo.savePrettyJson(
        frontpage.concat(data),
        {filename: 'hacker_news.json'}
      );
    }
  }
);
