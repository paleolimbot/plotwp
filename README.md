
# Plot.wp

Add JSON-based plots to posts and pages using the [plotly](https://plot.ly/javascript/) API

## Installation

Install **Plot.wp** from the Wordpress Codex or from the releases page. Unzip the folder into your `plugins` directory and start using the `[plotly]...[/plotly]` shortcode!

## The plotly shortcode

The plot.wp plugin works by taking whatever is between the `[plotly]` and `[/plotly]`, converting it to JSON, and passing it to `Plotly.plot('plotlydiv', {...})`.

```
[plotly]
{
  "data": [{
    "x": [1, 2, 3, 4, 5],
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
```

You can also set attributes of the enclosing `div` by passing these to the shortcode in the form `[plotly style="height: 200px"]...[/plotly]`. Default settings are controlled by the `defaultplot.css` stylesheet, although this behaviour may be migrated to a settings page in the future.


