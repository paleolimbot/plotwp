=== Plot.wp ===
Contributors: paleolimbot
Tags: charts, graphs, plot, plots, scientific
Requires at least: 3.7
Tested up to: 4.6.1
Stable tag: v0.4
License: GPLv2 or later
Donate link: http://apps.fishandwhistle.net/donate

Add JSON-based plots to posts and pages using the plotly.js API

== Description ==

Plot.wp enables the `[plotly]` shortcode, allowing easy inclusion of JSON-based plots using the [plotly](https://plot.ly/javascript/) API. Just add valid plotly JSON between the `[plotly]` and `[/plotly]` shortcodes, and revel as an interactive plot appears in your post.

== Installation ==

Upload the Plot.wp plugin to your blog, Activate it, then use the `[plotly]...[/plotly]` shortcode to start plotting!

== Frequently Asked Questions ==

= How do I add a plot to my post/page? =

Plots are added using the `[plotly]...[/plotly]` shortcode. In between the shortcode must be a valid JSON object that will be passed to `Plotly.plot('myDiv', ...)`.

<code>
[plotly]
{
  "data": [{
    "x": [1, 2, 3, 4],
    "y": [27, 28, 29, 50],
    "mode": "lines+markers",
    "type": "scatter"
  }],
  "layout": {
    "margin": {
      "t": 40, "r": 40, "b": 40, "l":40
    }
  }
}
[/plotly]
</code>

For more information about the [plotly](http://plot.ly).js API, see the [online documentation](https://plot.ly/javascript/).

== Screenshots ==

1. A plot created with the `[plotly]...[/plotly]` shortcode.

== Changelog ==

= 0.4 =

*Release Date - 10 November 2016*

* First release of the Plot.wp plugin.

== Upgrade Notice ==

= 0.4 =

First release of the Plot.wp plugin.