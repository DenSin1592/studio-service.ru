(function ($) {
    $(document).ready(function () {


        $('form [data-search-url]').each((_, el) => {

            let modelSearchBlock = $(el);
            let productLinks =  modelSearchBlock.siblings('.model-edit-links');
            let editLink = productLinks.find('a[data-edit-link]');
            let siteLink = productLinks.find('a[data-site-link]');
            let editLinkInitialHref = editLink.attr('href');
            let siteLinkInitialHref = siteLink.attr('href');
            let searchUrl = modelSearchBlock.data('search-url');
            let editUrlName = modelSearchBlock.data('edit-url-name');
            let showOnSiteUrlName = modelSearchBlock.data('show_on-site-url-name');


            if (modelSearchBlock.length > 0) {
                let setProductLinks = (edit_link, site_link) => {
                    editLink.attr('href', edit_link);
                    siteLink.attr('href', site_link);
                    if (site_link === '#') {
                        siteLink.hide();
                    } else {
                        siteLink.show();
                    }
                };


                modelSearchBlock.select2({
                    theme: "bootstrap",
                    language: "ru",
                    ajax: {
                        url: searchUrl,
                        dataType: 'json',
                        delay: 1500,
                        data: (params) => {
                            return {
                                searchString: params.term,
                                page: params.page || 1,
                                editUrlName: editUrlName,
                                showOnSiteUrlName: showOnSiteUrlName,
                            };
                        }
                    },
                    templateSelection: (repo) => {
                        if (typeof repo.edit_link == 'undefined' && typeof repo.site_link == 'undefined') {
                            setProductLinks(editLinkInitialHref, siteLinkInitialHref);
                        } else {
                            productLinks.css('display', 'inline-block');
                            setProductLinks(repo.edit_link, repo.site_link);
                        }
                        return repo.text;
                    },
                    placeholder: 'Выберите запись',
                    minimumInputLength: 0
                });
            }

            modelSearchBlock.next('span.select2').addClass('inline-block')
        });


    });
})(jQuery);
