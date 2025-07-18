<!DOCTYPE html>
<html>
<body style="margin:0; padding:0; font-family: 'Poppins', Arial, sans-serif; background-color: #0A0A1A; color: #E0E0FF;">
    <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#0A0A1A">
        <tr>
            <td align="center" style="padding: 30px 10px;">
                <table width="580" cellspacing="0" cellpadding="0" bgcolor="#0A0A1A" style="border: 1px solid #00F5FF; box-shadow: 0 0 20px rgba(151, 71, 255, 0.3);">
                    <tr>
                        <td style="padding: 30px 20px; text-align: center; border-bottom: 1px solid #9747FF;">
                            <img src="https://res.cloudinary.com/ddlxp23kv/image/upload/v1752645176/Screenshot_2025-07-16_085238_kqctzm.png" alt="001" width="180" style="border: 2px solid #00F5FF; padding: 5px; background: rgba(0, 245, 255, 0.1); box-shadow: 0 0 15px rgba(0, 245, 255, 0.4);">
                            <h2 style="margin: 15px 0 0 0; color: #00F5FF; text-transform: uppercase; letter-spacing: 2px; font-size: 22px;">WEAPON REQUEST PROTOCOL</h2>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 30px;">
                            <p style="margin: 0 0 10px 0; color: #E0E0FF; font-size: 16px;">
                                Hello two zeros and one team <span style="color: #FF00E5;">:)</span>,
                            </p>
                            
                            <div style="background: rgba(255, 0, 229, 0.1); border-left: 3px solid #FF00E5; padding: 15px; margin: 20px 0;">
                                <p style="margin: 0; color: #E0E0FF; line-height: 1.6;">
                                    <span style="color: #00F5FF; font-weight: bold;">⫸ INCOMING REQUEST ⫷</span><br>
                                    The attached file is a weapon request from user:<br>
                                    <span style="color: #9747FF; font-family: monospace; word-break: break-all;">{{ $senderEmail }}</span>
                                </p>
                            </div>
                            
                            <p style="margin: 20px 0; color: #E0E0FF; font-size: 14px;">
                                <span style="color: #00F5FF;">!</span> Please review it promptly.
                            </p>
                            
                            <table width="100%" cellspacing="0" cellpadding="0" style="margin: 30px 0; background: rgba(10, 10, 26, 0.7); border: 1px dashed #FF00E5;">
                                <tr>
                                    <td align="center" style="padding: 25px;">
                                        <p style="margin: 0 0 15px 0; color: #00F5FF; font-size: 12px; letter-spacing: 1px; font-family: monospace;">SECURE VERIFICATION CODE</p>
                                        <img src="{{ $message->embed($qrPath) }}" alt="QR Code" style="max-width: 150px; height: auto; border: 1px solid #9747FF; padding: 8px; background: white;">
                                        <p style="margin: 15px 0 0 0; color: #FF00E5; font-size: 11px; font-family: monospace;">PRIORITY LEVEL: HIGH</p>
                                    </td>
                                </tr>
                            </table>
                            
                            <table width="100%" cellspacing="0" cellpadding="0" style="margin: 20px 0;">
                                <tr>
                                    <td align="center" style="padding: 10px 0; color: #9747FF; font-family: monospace; font-size: 11px;">
                                        01010111 01000101 01000001 01010000 01001111 01001110
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td style="padding: 20px; text-align: center; border-top: 1px solid #9747FF; background: rgba(0, 0, 0, 0.3);">
                            <p style="margin: 0; color: #00F5FF; font-size: 10px; letter-spacing: 1px;">
                                [AUTO-GENERATED MESSAGE]
                            </p>
                            <p style="margin: 5px 0 0 0; color: #E0E0FF; font-size: 11px; font-family: monospace;">
                                {{ now()->format('Y-m-d H:i:s') }} UTC
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>